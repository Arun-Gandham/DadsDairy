@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<h1 class="page-title">
    <i class="fas fa-home"></i> Welcome, {{ Auth::user()->name }}!
</h1>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    <!-- Example stat cards -->
    <div class="col-md-3">
        <div class="stat-card">
            <h5>Total Users</h5>
            <div class="number">{{ $userCount ?? 0 }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <h5>Total Orders</h5>
            <div class="number">{{ $orderCount ?? 0 }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <h5>Total Products</h5>
            <div class="number">{{ $productCount ?? 0 }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <h5>Total Categories</h5>
            <div class="number">{{ $categoryCount ?? 0 }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <h5>Total Revenue</h5>
            <div class="number">₹{{ number_format($totalRevenue, 0) }}</div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('admin.products.create') }}" class="btn btn-gradient btn-lg">
            <i class="fas fa-plus"></i> Add Product
        </a>
        <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-box"></i> Manage Products
        </a>
        <a href="{{ route('admin.orders') }}" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-shopping-cart"></i> View Orders
        </a>
    </div>
</div>

<!-- Recent Orders -->
<div class="card">
    <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
        <h5 class="mb-0">Recent Orders</h5>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentOrders as $order)
                <tr>
                    <td><strong>{{ $order->order_number }}</strong></td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>₹{{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
