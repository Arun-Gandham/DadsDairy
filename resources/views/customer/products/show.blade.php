<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Dad's Dairy</title>
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
        .product-image {
            height: 400px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 100px;
            border-radius: 8px;
        }
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
            <a class="navbar-brand" href="{{ route('customer.dashboard') }}">🥛 Dad's Dairy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><h6 class="dropdown-header">{{ Auth::user()->email }}</h6></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('customer.profile.show') }}"><i class="fas fa-user"></i> My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('customer.orders') }}"><i class="fas fa-list"></i> My Orders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
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
                <div class="mb-4">
                    <a href="{{ route('customer.products') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Products
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="product-image">🥛</div>
                    </div>

                    <div class="col-md-6">
                        <h1>{{ $product->name }}</h1>
                        <p class="text-muted mb-3">{{ $product->category->name }}</p>

                        <h3 class="text-primary mb-3">₹{{ number_format($product->price, 2) }}</h3>

                        <div class="mb-4">
                            <p>
                                <strong>Stock Available:</strong>
                                <span class="badge bg-{{ $product->quantity > 0 ? 'success' : 'danger' }}">
                                    {{ $product->quantity }} units
                                </span>
                            </p>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Description</h5>
                            </div>
                            <div class="card-body">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>

                        @if ($product->quantity > 0)
                        <div class="mb-4">
                            @if ($product->type === 'subscribe')
                                <a href="{{ route('customer.subscriptions.create', $product) }}" class="btn btn-gradient btn-lg w-100">
                                    <i class="fas fa-sync"></i> Subscribe Now
                                </a>
                            @elseif ($product->type === 'buy')
                                @if ($inCart)
                                    <div class="alert alert-info mb-3">
                                        <i class="fas fa-check"></i> This item is already in your cart
                                    </div>
                                    <a href="{{ route('customer.cart') }}" class="btn btn-outline-primary btn-lg w-100 mb-2">
                                        <i class="fas fa-shopping-cart"></i> View Cart
                                    </a>
                                @else
                                    <form action="{{ route('customer.cart.add', $product) }}" method="POST" class="mb-3">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Quantity</span>
                                            <input type="number" name="quantity" class="form-control" value="1" min="1" max="{{ $product->quantity }}">
                                        </div>
                                        <button type="submit" class="btn btn-gradient btn-lg w-100">
                                            <i class="fas fa-shopping-cart"></i> Add to Cart
                                        </button>
                                    </form>
                                @endif
                            @else
                                <div class="row g-2 mb-4">
                                    @if ($inCart)
                                        <div class="col-12">
                                            <div class="alert alert-info mb-2">
                                                <i class="fas fa-check"></i> This item is already in your cart
                                            </div>
                                            <a href="{{ route('customer.cart') }}" class="btn btn-outline-primary btn-lg w-100">
                                                <i class="fas fa-shopping-cart"></i> View Cart
                                            </a>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <form action="{{ route('customer.cart.add', $product) }}" method="POST">
                                                @csrf
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">Quantity</span>
                                                    <input type="number" name="quantity" class="form-control" value="1" min="1" max="{{ $product->quantity }}">
                                                </div>
                                                <button type="submit" class="btn btn-gradient btn-lg w-100">
                                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <a href="{{ route('customer.subscriptions.create', $product) }}" class="btn btn-outline-secondary btn-lg w-100">
                                    <i class="fas fa-sync"></i> Subscribe Now
                                </a>
                            @endif
                        </div>
                        @else
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> This product is currently out of stock
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
