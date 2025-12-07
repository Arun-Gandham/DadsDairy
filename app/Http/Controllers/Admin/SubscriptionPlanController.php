<?php
namespace App\Http\Controllers\Admin;

use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;

class SubscriptionPlanController extends \App\Http\Controllers\Controller
{
    // List all plans
    public function index()
    {
        $plans = SubscriptionPlan::all();
        return view('admin.subscription_plans.index', compact('plans'));
    }

    // Show create form
    public function create()
    {
        return view('admin.subscription_plans.create');
    }

    // Store new plan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'ml' => 'required|string|max:20',
            'name' => 'required|string|max:50',
            'duration_days' => 'required|integer|min:1',
            'price_per_unit' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
            'discounted_price' => 'required|numeric|min:0',
            'active' => 'boolean',
        ]);
        SubscriptionPlan::create($validated);
        return redirect()->route('admin.subscription_plans.index')->with('success', 'Plan created');
    }

    // Edit form
    public function edit(SubscriptionPlan $subscription_plan)
    {
        return view('admin.subscription_plans.edit', ['plan' => $subscription_plan]);
    }

    // Update plan
    public function update(Request $request, SubscriptionPlan $subscription_plan)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'ml' => 'required|string|max:20',
            'name' => 'required|string|max:50',
            'duration_days' => 'required|integer|min:1',
            'price_per_unit' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
            'discounted_price' => 'required|numeric|min:0',
            'active' => 'boolean',
        ]);
        $subscription_plan->update($validated);
        return redirect()->route('admin.subscription_plans.index')->with('success', 'Plan updated');
    }

    // Delete plan
    public function destroy(SubscriptionPlan $subscription_plan)
    {
        $subscription_plan->delete();
        return redirect()->route('admin.subscription_plans.index')->with('success', 'Plan deleted');
    }
}
