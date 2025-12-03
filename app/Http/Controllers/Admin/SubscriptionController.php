<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['user', 'product'])->get();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function show($id)
    {
        $subscription = Subscription::with(['user', 'product'])->findOrFail($id);
        return view('admin.subscriptions.show', compact('subscription'));
    }

    public function update(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->status = $request->status;
        $subscription->save();
        return back()->with('success', 'Subscription status updated.');
    }
}
