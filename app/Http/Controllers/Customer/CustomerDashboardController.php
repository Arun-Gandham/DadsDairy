<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    /**
     * Show customer dashboard
     */
    public function dashboard()
    {
        $user                = Auth::user();
        $totalOrders         = $user->orders()->count();
        $totalSpent          = $user->orders()->where('status', 'delivered')->sum('total_amount');
        $activeSubscriptions = $user->subscriptions()->where('status', 'active')->count();
        $cartCount           = $user->cartItems()->count();

        $recentOrders        = $user->orders()->latest()->limit(5)->get();
        $activeSubscriptions = $user->subscriptions()->where('status', 'active')->get();

        return view('customer.dashboard', compact(
            'totalOrders',
            'totalSpent',
            'activeSubscriptions',
            'cartCount',
            'recentOrders'
        ));
    }

    /**
     * Show products list
     */
    public function products()
    {
        $products  = Product::where('is_active', true)->paginate(12);
        $cartItems = Cart::where('user_id', Auth::id())->pluck('product_id')->toArray();
        return view('customer.products.index', compact('products', 'cartItems'));
    }

    /**
     * Show product details
     */
    public function showProduct(Product $product)
    {
        $inCart = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        return view('customer.products.show', compact('product', 'inCart'));
    }

    /**
     * Show orders
     */
    public function orders()
    {
        $orders = Auth::user()->orders()->with('items.product')->latest()->paginate(10);
        return view('customer.orders.index', compact('orders'));
    }

    /**
     * Show order details
     */
    public function showOrder(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');
        return view('customer.orders.show', compact('order'));
    }
}
