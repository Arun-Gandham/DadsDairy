@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1>Add Subscription Plan</h1>
    <form action="{{ route('admin.subscription_plans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-select" required>
                <option value="">Select Product</option>
                @foreach(App\Models\Product::whereIn('type', ['subscription', 'both'])->get() as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Plan Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="duration_days" class="form-label">Duration (days)</label>
            <input type="number" name="duration_days" id="duration_days" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="ml" class="form-label">Milk Quantity (ml/L)</label>
            <input type="text" name="ml" id="ml" class="form-control" placeholder="e.g. 500ml, 1L" required>
        </div>
        <div class="mb-3">
            <label for="price_per_unit" class="form-label">Price per Milk Unit</label>
            <input type="number" step="0.01" name="price_per_unit" id="price_per_unit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total_price" class="form-label">Total Price (before discount)</label>
            <input type="number" step="0.01" name="total_price" id="total_price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="discounted_price" class="form-label">Discounted Price (after discount)</label>
            <input type="number" step="0.01" name="discounted_price" id="discounted_price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="active" class="form-label">Active</label>
            <select name="active" id="active" class="form-select">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create Plan</button>
        <a href="{{ route('admin.subscription_plans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
