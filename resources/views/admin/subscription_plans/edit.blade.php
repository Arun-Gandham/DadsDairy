@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1>Edit Subscription Plan</h1>
    <form action="{{ route('admin.subscription_plans.update', $plan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-select" required>
                <option value="">Select Product</option>
                @foreach(App\Models\Product::whereIn('type', ['subscription', 'both'])->get() as $product)
                    <option value="{{ $product->id }}" @if($plan->product_id == $product->id) selected @endif>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Plan Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $plan->name }}" required>
        </div>
        <div class="mb-3">
            <label for="duration_days" class="form-label">Duration (days)</label>
            <input type="number" name="duration_days" id="duration_days" class="form-control" value="{{ $plan->duration_days }}" required>
        </div>
        <div class="mb-3">
            <label for="ml" class="form-label">Milk Quantity (ml/L)</label>
            <input type="text" name="ml" id="ml" class="form-control" value="{{ $plan->ml }}" placeholder="e.g. 500ml, 1L" required>
        </div>
        <div class="mb-3">
            <label for="price_per_unit" class="form-label">Price per Milk Unit</label>
            <input type="number" step="0.01" name="price_per_unit" id="price_per_unit" class="form-control" value="{{ $plan->price_per_unit }}" required>
        </div>
        <div class="mb-3">
            <label for="active" class="form-label">Active</label>
            <select name="active" id="active" class="form-select">
                <option value="1" @if($plan->active) selected @endif>Active</option>
                <option value="0" @if(!$plan->active) selected @endif>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Plan</button>
        <a href="{{ route('admin.subscription_plans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
