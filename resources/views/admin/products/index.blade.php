@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
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
                <div class="text-center pt-2 pb-1">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.png') }}"
                        class="card-img-top mb-2" alt="{{ $product->name }}" style="max-height:140px;max-width:90%;object-fit:cover;border-radius:8px;"
                        onerror="this.onerror=null;this.src='https://via.placeholder.com/300x140?text=No+Image';">
                    @if ($product->images && is_array($product->images) && count($product->images))
                        <div class="d-flex flex-row flex-wrap overflow-auto justify-content-center" style="gap:10px;max-width:100%;">
                            @foreach ($product->images as $img)
                                <img src="{{ asset('storage/' . $img) }}" alt="Sub Image" class="img-thumbnail" style="max-width:48px;max-height:48px;object-fit:cover;">
                            @endforeach
                        </div>
                    @endif
                </div>
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
