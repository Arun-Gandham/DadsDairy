@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <h1 class="d-inline-block ms-3">Products</h1>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Product
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    @forelse ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                 <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.png') }}"
                     class="card-img-top" alt="{{ $product->name }}" style="max-height:180px;object-fit:cover;"
                     onerror="this.onerror=null;this.src='https://via.placeholder.com/300x180?text=No+Image';">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text mb-1"><strong>Category:</strong> {{ $product->category->name }}</p>
                    <p class="card-text mb-1"><strong>Price:</strong> ₹{{ number_format($product->price, 2) }}</p>
                    <p class="card-text mb-1"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                    <span class="badge bg-{{ $product->is_active ? 'success' : 'danger' }}">
                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    <form action="{{ route('admin.products.update', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="is_active" value="{{ $product->is_active ? 0 : 1 }}">
                        <button type="submit" class="btn btn-sm btn-secondary">
                            {{ $product->is_active ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <div class="alert alert-info">No products found</div>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
@endsection
