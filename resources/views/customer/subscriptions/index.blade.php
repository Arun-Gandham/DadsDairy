<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Subscriptions - Dad's Dairy</title>
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
        .subscription-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">🥛 Dad's Dairy</a>
            <div class="ms-auto">
                <span class="text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </nav>

    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2">
            <div class="sidebar">
                <a href="{{ route('customer.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('customer.products') }}">
                    <i class="fas fa-shopping-bag"></i> Shop
                </a>
                <a href="{{ route('customer.cart') }}">
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
                <a href="{{ route('customer.orders') }}">
                    <i class="fas fa-list"></i> Orders
                </a>
                <a href="{{ route('customer.subscriptions.index') }}" class="active">
                    <i class="fas fa-sync"></i> Subscriptions
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>My Subscriptions</h1>
                    <a href="{{ route('customer.products') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> New Subscription
                    </a>
                </div>

                <div class="row">
                    @forelse ($subscriptions as $subscription)
                    <div class="col-md-6">
                        <div class="subscription-card">
                            <h5>{{ $subscription->product->name }}</h5>
                            <p class="text-muted mb-3">
                                <i class="fas fa-box"></i> {{ $subscription->quantity }} unit(s) •
                                <i class="fas fa-calendar"></i> {{ ucfirst($subscription->frequency) }}
                            </p>
                            <p class="mb-2">
                                <strong>Next Delivery:</strong> {{ $subscription->next_delivery_date->format('d M Y') }}
                            </p>
                            <p class="mb-3">
                                <strong>Status:</strong>
                                <span class="badge bg-{{ $subscription->status === 'active' ? 'success' : 'warning' }}">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </p>
                            <div class="btn-group" role="group">
                                <a href="{{ route('customer.subscriptions.show', $subscription) }}" class="btn btn-sm btn-primary">View</a>
                                @if ($subscription->status === 'active')
                                    <form action="{{ route('customer.subscriptions.pause', $subscription) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-warning">Pause</button>
                                    </form>
                                @else
                                    <form action="{{ route('customer.subscriptions.resume', $subscription) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Resume</button>
                                    </form>
                                @endif
                                <form action="{{ route('customer.subscriptions.cancel', $subscription) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            No subscriptions yet. <a href="{{ route('customer.products') }}">Subscribe to a product</a>
                        </div>
                    </div>
                    @endforelse
                </div>

                {{ $subscriptions->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
