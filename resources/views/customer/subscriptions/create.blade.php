<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe - Dad's Dairy</title>
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
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
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
                    <h1>Subscribe to {{ $product->name }}</h1>
                    <a href="{{ route('customer.products.show', $product) }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Subscription Details</h5>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('customer.subscriptions.store', $product) }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity per Delivery</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="{{ $product->quantity }}" value="1" required>
                                        <small class="text-muted">Available stock: {{ $product->quantity }} units</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="frequency" class="form-label">Delivery Frequency</label>
                                        <select class="form-select" id="frequency" name="frequency" required>
                                            <option value="">-- Select Frequency --</option>
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="next_delivery_date" class="form-label">First Delivery Date</label>
                                        <input type="date" class="form-control" id="next_delivery_date" name="next_delivery_date" min="{{ date('Y-m-d') }}" required>
                                    </div>

                                    <button type="submit" class="btn btn-gradient btn-lg w-100">
                                        <i class="fas fa-check"></i> Start Subscription
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Product Details</h5>
                            </div>
                            <div class="card-body">
                                <p>
                                    <strong>Product:</strong> <br>
                                    {{ $product->name }}
                                </p>
                                <p>
                                    <strong>Category:</strong> <br>
                                    {{ $product->category->name }}
                                </p>
                                <p>
                                    <strong>Price per Unit:</strong> <br>
                                    ₹{{ number_format($product->price, 2) }}
                                </p>
                                <hr>
                                <p>
                                    <strong>Description:</strong> <br>
                                    <small>{{ $product->description }}</small>
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Subscription Info</h5>
                            </div>
                            <div class="card-body">
                                <p>
                                    <strong>How it works:</strong>
                                </p>
                                <ul>
                                    <li>Choose quantity and frequency</li>
                                    <li>Select first delivery date</li>
                                    <li>Auto-delivery on schedule</li>
                                    <li>Pause or cancel anytime</li>
                                </ul>
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
