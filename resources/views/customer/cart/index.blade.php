@extends('customer.layouts.app')

@section('title', "Welcome to Dad's Dairy")
@section('content')

    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2">
            <div class="sidebar">
                <a href="{{ route('customer.products') }}">
                    <i class="fas fa-shopping-bag"></i> Shop
                </a>
                <a href="{{ route('customer.cart') }}" class="active">
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
                <h1 class="mb-4">Shopping Cart</h1>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($cartItems->isEmpty())
                    <div class="alert alert-info">
                        Your cart is empty. <a href="{{ route('customer.products') }}">Continue shopping</a>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Subtotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>₹{{ number_format($item->price, 2) }}</td>
                                                <td>
                                                    <form action="{{ route('customer.cart.update', $item) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width: 80px; display: inline;" onchange="this.form.submit()">
                                                    </form>
                                                </td>
                                                <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                                                <td>
                                                    <form action="{{ route('customer.cart.remove', $item) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Order Summary</h5>
                                    <hr>
                                    <p>Subtotal: <strong>₹{{ number_format($totalPrice, 2) }}</strong></p>
                                    <hr>
                                    <h5>Total: <strong>₹{{ number_format($totalPrice, 2) }}</strong></h5>
                                    <a href="{{ route('customer.checkout') }}" class="btn btn-gradient w-100 mt-3">Proceed to Checkout</a>
                                    <a href="{{ route('customer.products') }}" class="btn btn-outline-secondary w-100 mt-2">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection