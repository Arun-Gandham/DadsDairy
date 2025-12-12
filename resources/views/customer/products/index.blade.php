@extends('customer.layouts.app')

@section('title', "Welcome to Dad's Dairy")
@section('content')
    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2">
            <div class="sidebar">
                <a href="{{ route('customer.products') }}" class="active">
                    <i class="fas fa-shopping-bag"></i> Shop
                </a>
                <a href="{{ route('customer.cart') }}">
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
                <a href="{{ route('customer.orders') }}">
                    <i class="fas fa-list"></i> Orders
                </a>
                <a href="{{ route('customer.subscriptions.index') }}">
                    <i class="fas fa-sync"></i> Subscriptions
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="main-content">
                <h1 class="mb-4">Our Products</h1>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row">
                    @forelse ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="product-card">
                            <div class="product-image">
                                🥛
                            </div>
                            <div class="product-info">
                                <div class="product-name">{{ $product->name }}</div>
                                <div class="product-price">₹{{ number_format($product->price, 2) }}</div>
                                <p class="text-muted small mb-3">{{ Str::limit($product->description, 50) }}</p>
                                <p class="text-muted small mb-3">
                                    <strong>Stock:</strong> {{ $product->quantity }} units
                                </p>
                                <div class="d-grid gap-2">
                                    <a href="{{ route('customer.products.show', $product) }}" class="btn btn-outline-primary btn-sm">
                                        View Details
                                    </a>
                                    @if (in_array($product->id, $cartItems ?? []))
                                        <a href="{{ route('customer.cart') }}" class="btn btn-gradient btn-sm">
                                            <i class="fas fa-check"></i> In Cart
                                        </a>
                                    @else
                                        <form action="{{ route('customer.cart.add', $product) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-gradient btn-sm w-100">
                                                <i class="fas fa-shopping-cart"></i> Add to Cart
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info">No products available</div>
                    </div>
                    @endforelse
                </div>

                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection