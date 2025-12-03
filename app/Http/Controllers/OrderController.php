<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Show checkout page
     */
    public function checkout()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.cart')->with('error', 'Cart is empty');
        }

        $totalPrice = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        return view('customer.checkout.index', compact('cartItems', 'totalPrice'));
    }

    /**
     * Validate coupon via AJAX
     */
    public function validateCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string',
            'order_total' => 'required|numeric|min:0',
        ]);

        $coupon = Coupon::where('code', strtoupper($request->coupon_code))->first();

        if (! $coupon) {
            return response()->json([
                'valid'   => false,
                'message' => 'Coupon code not found.',
            ]);
        }

        // Check if coupon is valid
        if (! $coupon->isValid(Auth::id())) {
            return response()->json([
                'valid'   => false,
                'message' => 'This coupon is no longer valid or has exceeded usage limits.',
            ]);
        }

        // Check minimum order value
        if ($coupon->min_order_value && $request->order_total < $coupon->min_order_value) {
            return response()->json([
                'valid'   => false,
                'message' => 'Minimum order value of Rs. ' . $coupon->min_order_value . ' required for this coupon.',
            ]);
        }

        // Check applicable_to constraint
        if ($coupon->applicable_to === 'first_order_only') {
            $userOrders = Auth::user()->orders()->count();
            if ($userOrders > 0) {
                return response()->json([
                    'valid'   => false,
                    'message' => 'This coupon is only valid for your first order.',
                ]);
            }
        }

        // Calculate discount
        $discount = $coupon->calculateDiscount($request->order_total);

        return response()->json([
            'valid'           => true,
            'message'         => 'Coupon applied successfully!',
            'coupon_id'       => $coupon->id,
            'coupon_code'     => $coupon->code,
            'discount_amount' => round($discount, 2),
            'discount_type'   => $coupon->discount_type,
            'discount_value'  => $coupon->discount_value,
        ]);
    }

    /**
     * Store order
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_method'   => 'required|in:cash,card',
            'delivery_type'    => 'required|in:home_delivery,pickup',
            'delivery_address' => 'required_if:delivery_type,home_delivery|string|max:500',
            'coupon_code'      => 'nullable|string',
        ]);

        $cartItems = Auth::user()->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.cart')->with('error', 'Cart is empty');
        }

        // Calculate order total
        $totalAmount    = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $discountAmount = 0;
        $coupon         = null;

        // Validate and apply coupon if provided
        if ($validated['coupon_code']) {
            $coupon = Coupon::where('code', strtoupper($validated['coupon_code']))->first();

            if (! $coupon || ! $coupon->isValid(Auth::id())) {
                return redirect()->back()->with('error', 'Invalid or expired coupon code.');
            }

            // Check minimum order value
            if ($coupon->min_order_value && $totalAmount < $coupon->min_order_value) {
                return redirect()->back()->with('error', 'Minimum order value of Rs. ' . $coupon->min_order_value . ' required.');
            }

            // Check first order only restriction
            if ($coupon->applicable_to === 'first_order_only') {
                $userOrders = Auth::user()->orders()->count();
                if ($userOrders > 0) {
                    return redirect()->back()->with('error', 'This coupon is only valid for your first order.');
                }
            }

            $discountAmount = $coupon->calculateDiscount($totalAmount);
        }

        // Create order
        $finalAmount = max(0, $totalAmount - $discountAmount);

        $order = Order::create([
            'order_number'     => 'ORD-' . strtoupper(Str::random(10)),
            'user_id'          => Auth::id(),
            'coupon_id'        => $coupon?->id,
            'total_amount'     => $finalAmount,
            'discount_amount'  => $discountAmount,
            'status'           => 'pending',
            'payment_method'   => $validated['payment_method'],
            'delivery_type'    => $validated['delivery_type'],
            'delivery_address' => $validated['delivery_address'] ?? null,
        ]);

        // Create order items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity'   => $cartItem->quantity,
                'price'      => $cartItem->price,
                'subtotal'   => $cartItem->price * $cartItem->quantity,
            ]);

            // Reduce product quantity
            $cartItem->product->decrement('quantity', $cartItem->quantity);
        }

        // Record coupon usage if coupon was applied
        if ($coupon) {
            CouponUsage::create([
                'coupon_id' => $coupon->id,
                'user_id'   => Auth::id(),
                'order_id'  => $order->id,
                'used_at'   => now(),
            ]);

            // Increment coupon usage count
            $coupon->increment('times_used');
        }

        // Clear cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('customer.orders.show', $order)->with('success', 'Order placed successfully');
    }

    /**
     * Show order details
     */
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product', 'deliveryAgent', 'coupon');
        return view('customer.orders.show', compact('order'));
    }

    /**
     * Cancel order
     */
    public function cancel(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if (in_array($order->status, ['pending', 'processing'])) {
            // Restore product quantities
            foreach ($order->items as $item) {
                $item->product->increment('quantity', $item->quantity);
            }

            $order->update(['status' => 'cancelled']);
            return redirect()->back()->with('success', 'Order cancelled successfully');
        }

        return redirect()->back()->with('error', 'Cannot cancel this order');
    }
}
