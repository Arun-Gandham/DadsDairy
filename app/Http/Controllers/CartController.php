<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Show cart
     */
    public function index()
    {
        $cartItems  = Auth::user()->cartItems()->with('product')->get();
        $totalPrice = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        return view('customer.cart.index', compact('cartItems', 'totalPrice'));
    }

    /**
     * Add item to cart
     */
    public function add(Product $product, Request $request)
    {
        $quantity = $request->input('quantity', 1);

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $quantity,
            ]);
        } else {
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $product->id,
                'quantity'   => $quantity,
                'price'      => $product->price,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart');
    }

    /**
     * Update cart item
     */
    public function update(Cart $cartItem, Request $request)
    {
        if ($cartItem->user_id !== Auth::id()) {
            abort(403);
        }

        $quantity = $request->input('quantity', 1);

        if ($quantity <= 0) {
            $cartItem->delete();
        } else {
            $cartItem->update(['quantity' => $quantity]);
        }

        return redirect()->back()->with('success', 'Cart updated');
    }

    /**
     * Remove item from cart
     */
    public function remove(Cart $cartItem)
    {
        if ($cartItem->user_id !== Auth::id()) {
            abort(403);
        }

        $cartItem->delete();
        return redirect()->back()->with('success', 'Item removed from cart');
    }

    /**
     * Clear cart
     */
    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Cart cleared');
    }
}
