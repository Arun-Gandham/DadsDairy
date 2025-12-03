<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Details - Dad's Dairy</title>
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
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
        }
        .btn-gradient:hover {
            color: white;
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
                    <h1>Subscription - {{ $subscription->product->name }}</h1>
                    <a href="{{ route('customer.subscriptions.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Subscriptions
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Subscription Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p>
                                            <strong>Product:</strong> <br>
                                            {{ $subscription->product->name }}
                                        </p>
                                        <p>
                                            <strong>Category:</strong> <br>
                                            {{ $subscription->product->category->name }}
                                        </p>
                                        <p>
                                            <strong>Price per Unit:</strong> <br>
                                            ₹{{ number_format($subscription->product->price, 2) }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>Quantity per Delivery:</strong> <br>
                                            {{ $subscription->quantity }} unit(s)
                                        </p>
                                        <p>
                                            <strong>Frequency:</strong> <br>
                                            {{ ucfirst($subscription->frequency) }}
                                        </p>
                                        <p>
                                            <strong>Next Delivery:</strong> <br>
                                            {{ $subscription->next_delivery_date->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p>
                                            <strong>Started On:</strong> <br>
                                            {{ $subscription->started_at->format('d M Y') }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>Status:</strong> <br>
                                            <span class="badge bg-{{ $subscription->status === 'active' ? 'success' : 'warning' }}">
                                                {{ ucfirst($subscription->status) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Update Subscription</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('customer.subscriptions.update', $subscription) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity per Delivery</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="{{ $subscription->quantity }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="frequency" class="form-label">Delivery Frequency</label>
                                        <select class="form-select" id="frequency" name="frequency" required>
                                            <option value="daily" {{ $subscription->frequency === 'daily' ? 'selected' : '' }}>Daily</option>
                                            <option value="weekly" {{ $subscription->frequency === 'weekly' ? 'selected' : '' }}>Weekly</option>
                                            <option value="monthly" {{ $subscription->frequency === 'monthly' ? 'selected' : '' }}>Monthly</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Subscription Actions</h5>
                            </div>
                            <div class="card-body">
                                @if ($subscription->status === 'active')
                                    <form action="{{ route('customer.subscriptions.pause', $subscription) }}" method="POST" class="mb-2">
                                        @csrf
                                        <button type="submit" class="btn btn-warning w-100">
                                            <i class="fas fa-pause"></i> Pause Subscription
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('customer.subscriptions.resume', $subscription) }}" method="POST" class="mb-2">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fas fa-play"></i> Resume Subscription
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('customer.subscriptions.cancel', $subscription) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this subscription?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100">
                                        <i class="fas fa-times"></i> Cancel Subscription
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
