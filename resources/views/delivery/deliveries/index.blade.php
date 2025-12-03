<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliveries - Dad's Dairy Delivery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .navbar { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .sidebar {
            background: white;
            min-height: calc(100vh - 60px);
            padding: 20px 0;
        }
        .sidebar a {
            color: #333;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            border-left: 4px solid transparent;
        }
        .sidebar a.active {
            background: #f0f0f0;
            border-left-color: #667eea;
            color: #667eea;
        }
        .main-content { padding: 30px; }
        .delivery-card {
            border-left: 4px solid #667eea;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">🚚 Dad's Dairy - Delivery Agent</a>
            <div class="ms-auto">
                <span class="text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </nav>

    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2">
            <div class="sidebar">
                <a href="{{ route('delivery.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('delivery.deliveries') }}" class="active">
                    <i class="fas fa-list"></i> Deliveries
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="main-content">
                <h1 class="mb-4">My Deliveries</h1>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3>{{ $pending_count }}</h3>
                                <p class="text-muted">Pending Deliveries</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3>{{ $completed_count }}</h3>
                                <p class="text-muted">Completed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="mb-3">Pending Deliveries</h3>
                @forelse ($deliveries as $order)
                    <div class="card delivery-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>Order #{{ $order->order_number }}</h5>
                                    <p class="mb-2">
                                        <strong>Customer:</strong> {{ $order->user->name }}<br>
                                        <strong>Phone:</strong> {{ $order->user->phone }}<br>
                                        <strong>Address:</strong> {{ $order->delivery_address ?? $order->user->address }}<br>
                                        <strong>Items:</strong> {{ $order->items->count() }} product(s)
                                    </p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <p class="mb-2">
                                        <span class="badge bg-warning">{{ ucfirst($order->status) }}</span>
                                    </p>
                                    <p class="mb-3">
                                        <strong>Total:</strong> ₹{{ number_format($order->total_amount, 2) }}
                                    </p>
                                    <a href="{{ route('delivery.deliveries.show', $order) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-map-marker-alt"></i> View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        No pending deliveries at the moment.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
