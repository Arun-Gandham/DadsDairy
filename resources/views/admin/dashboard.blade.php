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

<style>
    .stat-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(102,126,234,0.08);
        padding: 24px 18px 18px 18px;
        margin-bottom: 18px;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: transform 0.2s;
    }
    .stat-card:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 6px 24px rgba(102,126,234,0.18);
    }
    .stat-card h5 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        letter-spacing: 0.5px;
    }
    .stat-card .number {
        font-size: 2.1rem;
        font-weight: bold;
        margin-bottom: 0.2rem;
        letter-spacing: 1px;
    }
    .dashboard-analytics-table th {
        background: #667eea;
        color: #fff;
        font-weight: 600;
        border: none;
    }
    .dashboard-analytics-table td {
        background: #f8f9fa;
        border: none;
        font-size: 1.05rem;
    }
    .dashboard-analytics-table tr {
        border-bottom: 1px solid #e0e0e0;
    }
    .dashboard-analytics-table tbody tr:hover {
        background: #e9e7fd;
    }
    .dashboard-section-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #667eea;
        margin-bottom: 1rem;
        letter-spacing: 0.5px;
    }
    .card-header {
        border-radius: 16px 16px 0 0 !important;
    }
</style>
<div class="row g-3 mb-3">
    <div class="col-md-2 col-6">
        <a href="{{ route('admin.users') }}" class="stat-card d-block text-decoration-none">
            <h5>Total Users</h5>
            <div class="number">{{ $totalUsers ?? 0 }}</div>
        </a>
    </div>
    <div class="col-md-2 col-6">
        <a href="{{ route('admin.orders') }}" class="stat-card d-block text-decoration-none">
            <h5>Total Orders</h5>
            <div class="number">{{ $totalOrders ?? 0 }}</div>
        </a>
    </div>
    <div class="col-md-2 col-6">
        <a href="{{ route('admin.products') }}" class="stat-card d-block text-decoration-none">
            <h5>Total Products</h5>
            <div class="number">{{ $totalProducts ?? 0 }}</div>
        </a>
    </div>
    <div class="col-md-2 col-6">
        <a href="{{ route('admin.categories.index') }}" class="stat-card d-block text-decoration-none">
            <h5>Total Categories</h5>
            <div class="number">{{ $totalCategories ?? 0 }}</div>
        </a>
    </div>
    <div class="col-md-2 col-6">
        <a href="{{ route('admin.reports.index') }}" class="stat-card d-block text-decoration-none">
            <h5>Total Revenue</h5>
            <div class="number">₹{{ number_format($totalRevenue, 0) }}</div>
        </a>
    </div>
    <div class="col-md-2 col-6">
        <a href="{{ route('admin.reports.index') }}" class="stat-card d-block text-decoration-none">
            <h5>Revenue (This Month)</h5>
            <div class="number">₹{{ number_format($monthlyRevenue, 0) }}</div>
        </a>
    </div>
    <div class="col-md-2 col-6">
        <a href="{{ route('admin.reports.index') }}" class="stat-card d-block text-decoration-none">
            <h5>Revenue (This Year)</h5>
            <div class="number">₹{{ number_format($yearlyRevenue, 0) }}</div>
        </a>
    </div>
    <div class="col-md-2 col-6">
        <a href="{{ route('admin.orders') }}" class="stat-card d-block text-decoration-none">
            <h5>Orders (This Month)</h5>
            <div class="number">{{ $monthlyOrders ?? 0 }}</div>
        </a>
    </div>
    <div class="col-md-2 col-6">
        <a href="{{ route('admin.orders') }}" class="stat-card d-block text-decoration-none">
            <h5>Orders (This Year)</h5>
            <div class="number">{{ $yearlyOrders ?? 0 }}</div>
        </a>
    </div>
</div>

<!-- Product Analytics Table -->
<div class="card my-4">
    <div class="card-header">
        <span class="dashboard-section-title">Product Sales & Revenue (Delivered Orders)</span>
    </div>
    <div class="card-body">
        <table class="table dashboard-analytics-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Sold Quantity</th>
                    <th>Revenue</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productAnalytics as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['soldQty'] }}</td>
                    <td>₹{{ number_format($product['revenue'], 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Quick Actions: Redirect to each admin list -->
<div class="row mb-4 g-2">
    <div class="col-auto">
        <a href="{{ route('admin.products') }}" class="btn btn-gradient btn-lg">
            <i class="fas fa-box"></i> Products List
        </a>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-list"></i> Categories List
        </a>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.orders') }}" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-shopping-cart"></i> Orders List
        </a>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-users"></i> Users List
        </a>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-lock"></i> Permissions
        </a>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-sync"></i> Subscriptions
        </a>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.reports.index') }}" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-chart-bar"></i> Reports
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
