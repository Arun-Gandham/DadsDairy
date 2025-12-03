<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - Dad's Dairy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
        }
        .sidebar {
            background: white;
            min-height: calc(100vh - 60px);
            padding: 20px 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar a {
            color: #333;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }
        .sidebar a:hover {
            background: #f8f9fa;
            border-left-color: #667eea;
            color: #667eea;
        }
        .sidebar a.active {
            background: #f0f0f0;
            border-left-color: #667eea;
            color: #667eea;
            font-weight: bold;
        }
        .main-content {
            padding: 30px;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        .stat-card h5 {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .stat-card .number {
            font-size: 28px;
            font-weight: bold;
            color: #667eea;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
        }
        .btn-gradient:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .page-title {
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">🥛 Dad's Dairy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="color: white;">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2">
            <div class="sidebar">
                <a href="{{ route('customer.dashboard') }}" class="active">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('customer.products') }}">
                    <i class="fas fa-shopping-bag"></i> Shop
                </a>
                <a href="{{ route('customer.cart') }}">
                    <i class="fas fa-shopping-cart"></i> Cart <span class="badge bg-danger">{{ $cartCount ?? 0 }}</span>
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
                <h1 class="page-title">
                    <i class="fas fa-home"></i> Welcome, {{ Auth::user()->name }}!
                </h1>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="stat-card">
                            <h5>Total Orders</h5>
                            <div class="number">{{ $totalOrders }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <h5>Total Spent</h5>
                            <div class="number">₹{{ number_format($totalSpent, 2) }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <h5>Active Subscriptions</h5>
                            <div class="number">{{ $activeSubscriptions ?? 0 }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <h5>Items in Cart</h5>
                            <div class="number">{{ $cartCount ?? 0 }}</div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <a href="{{ route('customer.products') }}" class="btn btn-gradient btn-lg">
                            <i class="fas fa-shopping-bag"></i> Continue Shopping
                        </a>
                        <a href="{{ route('customer.cart') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-shopping-cart"></i> View Cart
                        </a>
                    </div>
                </div>

                <!-- Recent Orders -->
                @if ($recentOrders && $recentOrders->count() > 0)
                <div class="card">
                    <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                        <h5 class="mb-0">Recent Orders</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
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
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                    <td>₹{{ number_format($order->total_amount, 2) }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('customer.orders.show', $order) }}" class="btn btn-sm btn-primary">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
