<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Show subscriptions
     */
    public function index()
    {
        $subscriptions = Auth::user()->subscriptions()->with('product')->paginate(10);
        return view('customer.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show create subscription form
     */
    public function create(Product $product)
    {
        return view('customer.subscriptions.create', compact('product'));
    }

    /**
     * Store subscription
     */
    public function store(Product $product, Request $request)
    {
        $validated = $request->validate([
            'quantity'           => 'required|integer|min:1',
            'frequency'          => 'required|in:daily,weekly,monthly',
            'next_delivery_date' => 'required|date|after_or_equal:today',
        ]);

        $existingSubscription = Subscription::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->where('status', 'active')
            ->first();

        if ($existingSubscription) {
            return redirect()->back()->with('error', 'You already have an active subscription for this product');
        }

        Subscription::create([
            'user_id'            => Auth::id(),
            'product_id'         => $product->id,
            'quantity'           => $validated['quantity'],
            'frequency'          => $validated['frequency'],
            'next_delivery_date' => $validated['next_delivery_date'],
            'status'             => 'active',
        ]);

        return redirect()->route('customer.subscriptions.index')->with('success', 'Subscription created successfully');
    }

    /**
     * Show subscription details
     */
    public function show(Subscription $subscription)
    {
        if ($subscription->user_id !== Auth::id()) {
            abort(403);
        }

        $subscription->load('product', 'user');
        return view('customer.subscriptions.show', compact('subscription'));
    }

    /**
     * Pause subscription
     */
    public function pause(Subscription $subscription)
    {
        if ($subscription->user_id !== Auth::id()) {
            abort(403);
        }

        $subscription->update(['status' => 'paused']);
        return redirect()->back()->with('success', 'Subscription paused');
    }

    /**
     * Resume subscription
     */
    public function resume(Subscription $subscription)
    {
        if ($subscription->user_id !== Auth::id()) {
            abort(403);
        }

        $subscription->update(['status' => 'active']);
        return redirect()->back()->with('success', 'Subscription resumed');
    }

    /**
     * Cancel subscription
     */
    public function cancel(Subscription $subscription)
    {
        if ($subscription->user_id !== Auth::id()) {
            abort(403);
        }

        $subscription->update([
            'status'       => 'cancelled',
            'cancelled_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Subscription cancelled');
    }

    /**
     * Update subscription
     */
    public function update(Subscription $subscription, Request $request)
    {
        if ($subscription->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'quantity'  => 'required|integer|min:1',
            'frequency' => 'required|in:daily,weekly,monthly',
        ]);

        $subscription->update($validated);
        return redirect()->back()->with('success', 'Subscription updated');
    }
}
