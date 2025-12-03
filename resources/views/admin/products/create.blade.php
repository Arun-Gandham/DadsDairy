@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
<h1 class="mb-4">Add Product</h1>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Product form fields here -->
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Product Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
        <small class="text-muted">Unique identifier, e.g. 'full-cream-milk-1l'</small>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Product Type</label>
        <select class="form-select" id="type" name="type" required>
            <option value="buy" @if(old('type')=='buy') selected @endif>Buy Only</option>
            <option value="subscribe" @if(old('type')=='subscribe') selected @endif>Subscribe Only</option>
            <option value="both" @if(old('type')=='both') selected @endif>Both</option>
        </select>
        <small class="text-muted">Choose if this product can be bought, subscribed, or both.</small>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" id="category_id" name="category_id" required>
            <option value="">-- Select Category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Product Image</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
            <label class="form-check-label" for="is_active">
                Active
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-gradient">
        <i class="fas fa-save"></i> Add Product
    </button>
    <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary">Cancel</a>
</form>
@endsection
                                