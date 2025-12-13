<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - Dad's Dairy</title>
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
        .status-badge {
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: bold;
        }
        .status-pending { background: #ffc107; color: #000; }
        .status-processing { background: #17a2b8; color: #fff; }
        .status-shipped { background: #007bff; color: #fff; }
        .status-delivered { background: #28a745; color: #fff; }
        .status-cancelled { background: #dc3545; color: #fff; }
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
                <a href="{{ route('customer.products') }}">
                    <i class="fas fa-shopping-bag"></i> Shop
                </a>
                <a href="{{ route('customer.cart') }}">
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
                <a href="{{ route('customer.orders') }}" class="active">
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
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Order Details</h1>
                    <a href="{{ route('customer.orders') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Orders
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <!-- Order Info -->
                        <div class="card mb-4">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Order #{{ $order->order_number }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
                                        <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <strong>Status:</strong>
                                            <span class="status-badge status-{{ $order->status }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </p>
                                        <p><strong>Delivery Type:</strong> {{ ucfirst(str_replace('_', ' ', $order->delivery_type)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delivery Address -->
                        <div class="card mb-4">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Delivery Address & Contact</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Full Address:</strong> {{ $order->delivery_address }}</p>
                                <p><strong>Door Number:</strong> {{ $order->door_number }}</p>
                                <p><strong>Street:</strong> {{ $order->street }}</p>
                                <p><strong>Area:</strong> {{ $order->area }}</p>
                                <p><strong>City:</strong> {{ $order->city }}</p>
                                <p><strong>State:</strong> {{ $order->state }}</p>
                                <p><strong>Pin Code:</strong> {{ $order->pin_code }}</p>
                                <p><strong>Latitude:</strong> {{ $order->latitude }}</p>
                                <p><strong>Longitude:</strong> {{ $order->longitude }}</p>
                                <p><strong>Phone:</strong> {{ $order->phone ?? $order->user->phone ?? Auth::user()->phone }}</p>
                                <p><strong>Email:</strong> {{ $order->email ?? $order->user->email ?? Auth::user()->email }}</p>
                                @if ($order->latitude && $order->longitude)
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ $order->latitude }},{{ $order->longitude }}" target="_blank" class="btn btn-sm btn-outline-primary mb-2">
                                        <i class="fas fa-map-marker-alt"></i> View on Google Maps
                                    </a>
                                    <div id="order-map" style="height: 220px; width: 100%; margin-bottom: 10px;"></div>
                                    <script>
                                    function initOrderMap() {
                                        var lat = Number({{ $order->latitude }});
                                        var lng = Number({{ $order->longitude }});
                                        var map = new google.maps.Map(document.getElementById('order-map'), {
                                            center: { lat: lat, lng: lng },
                                            zoom: 17,
                                            mapTypeControl: false,
                                            streetViewControl: false,
                                            fullscreenControl: false,
                                            zoomControl: true,
                                        });
                                        var marker;
                                        if (google.maps.marker && google.maps.marker.AdvancedMarkerElement) {
                                            marker = new google.maps.marker.AdvancedMarkerElement({
                                                map: map,
                                                position: { lat: lat, lng: lng }
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: { lat: lat, lng: lng },
                                                map: map
                                            });
                                        }
                                    }
                                    window.initOrderMap = initOrderMap;
                                    </script>
                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initOrderMap&libraries=places"></script>
                                @endif
                                @if ($order->deliveryAgent)
                                    <p><strong>Delivery Agent:</strong> {{ $order->deliveryAgent->name }}</p>
                                @endif
                                @if ($order->delivered_at)
                                    <p><strong>Delivered On:</strong> {{ $order->delivered_at->format('d M Y, h:i A') }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="card mb-4">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Order Items</h5>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                        <tr>
                                            <td>
                                                <strong>{{ $item->product->name }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $item->product->category->name }}</small>
                                            </td>
                                            <td>₹{{ number_format($item->price, 2) }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>₹{{ number_format($item->subtotal, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Order Summary -->
                        <div class="card mb-4">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Order Summary</h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $subtotal = $order->items->sum('subtotal');
                                    $discount = $order->discount_amount;
                                    $beforeTax = $subtotal - $discount;
                                    $tax = $beforeTax * 0.18;
                                @endphp
                                <p>
                                    <strong>Subtotal:</strong>
                                    <span class="float-end">₹{{ number_format($subtotal, 2) }}</span>
                                </p>
                                @if ($discount > 0)
                                <p style="color: #28a745;">
                                    <strong>Discount @if($order->coupon) ({{ $order->coupon->code }}) @endif:</strong>
                                    <span class="float-end">- ₹{{ number_format($discount, 2) }}</span>
                                </p>
                                @endif
                                <p>
                                    <strong>Tax (18%):</strong>
                                    <span class="float-end">₹{{ number_format($tax, 2) }}</span>
                                </p>
                                <p>
                                    <strong>Shipping Type:</strong>
                                    <span class="float-end">{{ $order->shipping_option ?? 'N/A' }}</span>
                                </p>
                                <p>
                                    <strong>Shipping Total:</strong>
                                    <span class="float-end">₹{{ number_format($order->shipping_total ?? 0, 2) }}</span>
                                </p>
                                <hr>
                                <h5>
                                    <strong>Total:</strong>
                                    <span class="float-end">₹{{ number_format($order->total_amount, 2) }}</span>
                                </h5>
                            </div>
                        </div>

                        <!-- Actions -->
                        @if (in_array($order->status, ['pending', 'processing']))
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Order Actions</h6>
                                <form action="{{ route('customer.orders.cancel', $order) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100">
                                        <i class="fas fa-times"></i> Cancel Order
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endif

                        <!-- Status Timeline -->
                        <div class="card mt-4">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Order Timeline</h5>
                            </div>
                            <div class="card-body">
                                <div class="timeline">
                                    <p class="mb-2">
                                        <i class="fas fa-check-circle text-success"></i> <strong>Order Placed</strong>
                                        <br><small>{{ $order->created_at->format('d M Y') }}</small>
                                    </p>
                                    <p class="mb-2">
                                        <i class="fas fa-{{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? 'check-circle text-success' : 'circle text-muted' }}"></i>
                                        <strong>Processing</strong>
                                        <br><small>In progress...</small>
                                    </p>
                                    <p class="mb-2">
                                        <i class="fas fa-{{ in_array($order->status, ['shipped', 'delivered']) ? 'check-circle text-success' : 'circle text-muted' }}"></i>
                                        <strong>Shipped</strong>
                                        <br><small>On the way...</small>
                                    </p>
                                    <p>
                                        <i class="fas fa-{{ $order->status === 'delivered' ? 'check-circle text-success' : 'circle text-muted' }}"></i>
                                        <strong>Delivered</strong>
                                        @if ($order->delivered_at)
                                            <br><small>{{ $order->delivered_at->format('d M Y') }}</small>
                                        @else
                                            <br><small>Pending...</small>
                                        @endif
                                    </p>
                                </div>
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
