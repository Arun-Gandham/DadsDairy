{{-- <!DOCTYPE html>
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
    <li>
        <h6 class="dropdown-header">{{ Auth::user()->email }}</h6>
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item" href="{{ route('customer.profile.show') }}"><i class="fas fa-user"></i> My Profile</a></li>
    <li><a class="dropdown-item" href="{{ route('customer.orders') }}"><i class="fas fa-list"></i> My Orders</a></li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li>
        <form method="POST" action="{{ route('customer.logout') }}" style="display: inline;">
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
                @if(session('error'))
                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-6">
                    @php
                    $images = [];
                    if (!empty($product->image)) $images[] = $product->image;
                    if (!empty($product->images) && is_array($product->images)) {
                    foreach ($product->images as $img) {
                    if ($img && $img !== $product->image) $images[] = $img;
                    }
                    }
                    $defaultImage = asset('assets/img/default-product.png'); // Change path if needed
                    if (empty($images)) {
                    $images[] = $defaultImage;
                    }
                    @endphp
                    <div id="productImageCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($images as $idx => $img)
                            <div class="carousel-item @if($idx === 0) active @endif">
                                <img src="{{ Str::startsWith($img, 'http') ? $img : (file_exists(public_path('storage/' . $img)) ? asset('storage/' . $img) : $img) }}" class="d-block w-100" style="height:400px;object-fit:cover;border-radius:8px;" alt="Product Image">
                            </div>
                            @endforeach
                        </div>
                        @if(count($images) > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        @endif
                    </div>
                    @if(count($images) > 1)
                    <div class="d-flex justify-content-center gap-2" id="carouselThumbnails">
                        @foreach($images as $idx => $img)
                        <img src="{{ Str::startsWith($img, 'http') ? $img : (file_exists(public_path('storage/' . $img)) ? asset('storage/' . $img) : $img) }}" class="img-thumbnail carousel-thumb @if($idx === 0) border-primary thumb-active @endif" style="width:60px;height:60px;object-fit:cover;cursor:pointer;" data-bs-target="#productImageCarousel" data-bs-slide-to="{{ $idx }}">
                        @endforeach
                    </div>
                    <style>
                        .carousel-thumb.thumb-active {
                            border: 2px solid #667eea;
                            box-shadow: 0 0 8px #667eea;
                        }

                    </style>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var carouselEl = document.getElementById('productImageCarousel');
                            var thumbs = document.querySelectorAll('.carousel-thumb');
                            if (carouselEl && thumbs.length) {
                                carouselEl.addEventListener('slid.bs.carousel', function(e) {
                                    thumbs.forEach(function(thumb, idx) {
                                        thumb.classList.remove('border-primary', 'thumb-active');
                                    });
                                    var activeIdx = e.to;
                                    if (typeof activeIdx === 'undefined') {
                                        // fallback for Bootstrap 5.3
                                        activeIdx = Array.from(carouselEl.querySelectorAll('.carousel-item')).findIndex(function(item) {
                                            return item.classList.contains('active');
                                        });
                                    }
                                    if (activeIdx >= 0 && thumbs[activeIdx]) {
                                        thumbs[activeIdx].classList.add('border-primary', 'thumb-active');
                                    }
                                });
                                // Also allow clicking thumbnail to activate
                                thumbs.forEach(function(thumb, idx) {
                                    thumb.addEventListener('click', function() {
                                        thumbs.forEach(function(t) {
                                            t.classList.remove('border-primary', 'thumb-active');
                                        });
                                        thumb.classList.add('border-primary', 'thumb-active');
                                    });
                                });
                            }
                        });

                    </script>
                    @endif
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

                    <div class="mb-4">
                        {!! $product->description !!}
                    </div>

                    @if ($product->quantity > 0)
                    <div class="mb-4">
                        @if ($product->type === 'subscribe' || $product->type === 'both')
                        @if($subscriptionPlans->count())
                        <form id="planSelectForm" action="{{ route('customer.subscriptions.create', $product) }}" method="GET" class="mb-2">
                            <label class="form-label mb-3">Select a Subscription Plan</label>
                            <div class="row g-3">
                                @foreach($subscriptionPlans as $plan)
                                <div class="col-md-6">
                                    <div class="card h-100 mb-2 plan-card @if($loop->first) border-primary @endif" style="cursor:pointer;" data-plan-id="{{ $plan->id }}">
                                        <input class="form-check-input d-none" type="radio" name="subscription_plan_id" id="plan_{{ $plan->id }}" value="{{ $plan->id }}" required @if($loop->first) checked @endif>
                                        <div class="card-body">
                                            <strong>{{ $plan->name }}</strong><br>
                                            <span>Duration: {{ $plan->duration_days }} days</span><br>
                                            <span>Quantity: {{ $plan->ml }}</span><br>
                                            <span>Price per unit: ₹{{ number_format($plan->price_per_unit, 2) }}</span><br>
                                            @php
                                            $totalPrice = $plan->total_price ?? ($plan->price_per_unit * $plan->ml * $plan->duration_days);
                                            $discountedPrice = $plan->discounted_price ?? $totalPrice;
                                            $discountPercent = $totalPrice > 0 ? round((($totalPrice - $discountedPrice) / $totalPrice) * 100) : 0;
                                            @endphp
                                            <span>Price: <s>₹{{ number_format($totalPrice, 2) }}</s></span><br>
                                            <span class="text-success fw-bold">Discounted: ₹{{ number_format($discountedPrice, 2) }}</span><br>
                                            @if($discountPercent > 0)
                                            <span class="badge bg-success">{{ $discountPercent }}% OFF</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-gradient btn-lg w-100 mt-3">
                                <i class="fas fa-sync"></i> Subscribe Now
                            </button>
                        </form>
                        <script>
                            document.querySelectorAll('.plan-card').forEach(function(card) {
                                card.addEventListener('click', function() {
                                    // Uncheck all radios and remove highlight
                                    document.querySelectorAll('.plan-card').forEach(function(c) {
                                        c.classList.remove('border-primary');
                                        c.querySelector('input[type=radio]').checked = false;
                                    });
                                    // Check this radio and highlight card
                                    card.classList.add('border-primary');
                                    card.querySelector('input[type=radio]').checked = true;
                                });
                            });

                        </script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var carouselEl = document.getElementById('productImageCarousel');
                                if (carouselEl) {
                                    var carousel = new bootstrap.Carousel(carouselEl, {
                                        interval: 2000
                                        , ride: 'carousel'
                                    });
                                }
                            });

                        </script>
                        @else
                        <div class="alert alert-info">No subscription plans available for this product.</div>
                        @endif
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
</html> --}}
@extends('customer.layouts.app')
@section('title', 'Product Details - Dad\'s Dairy')
@section('head')
<link rel="icon" href="{{ asset('assets/customer/img/favicon.png') }}" type="image/png" />

<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@100..800&amp;display=swap" rel="stylesheet">
<link href="{{ asset('assets/customer/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('assets/customer/css/slicknav.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/customer/css/swiper-bundle.min.css') }}">
<link href="{{ asset('assets/customer/css/all.min.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('assets/customer/css/animate.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/customer/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/customer/css/mousecursor.css') }}">
<link href="{{ asset('assets/customer/css/custom.css') }}" rel="stylesheet" media="screen">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/customer/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/customer/css/hizoom.min.css') }}">

@endsection
@section('content')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-3" data-cursor="-opaque">A2 Cow Milk</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-product-single">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="page-product-single-box">
                    <div class="product-about-box">
                        <div class="row">
                            <div class="col-lg-6 col-sm-5">

                                <img src="{{ asset('assets/customer/img/product-1.jpg') }}" alt="Product" ; class="p-img">


                            </div>

                            <div class="col-lg-6 col-sm-7">
                                <div class="product-single-content">

                                    <h2 class="text-anime-style-2"> Milk</h2>
                                    <h3 class="wow fadeInUp" data-wow-delay="0.2s">$25.0 <span>$35.00</span></h3>
                                    <p class="wow fadeInUp" data-wow-delay="0.4s">Our fresh milk is sourced daily from healthy farms and hygienically processed to preserve its natural goodness. Rich in calcium, protein, and essential nutrients, it supports strong bones and overall wellness. Free from artificial preservatives, it delivers a pure, creamy taste that’s perfect for drinking, cooking, and everyday use.</p>
                                    <div class="tag-block qunatity">
                                        <h4 class="mb-3 wow fadeInUp" data-wow-delay="0.6s">Qunatity :</h4>
                                        <ul class="mb-3 wow fadeInUp" data-wow-delay="0.6s">
                                            <li><button type="button" class="btn btn-outline-primary btn-sm">250 ML</button></li>
                                            <li><button type="button" class="btn btn-outline-success btn-sm">500 ML</button></li>
                                            <li><button type="button" class="btn btn-outline-danger btn-sm">1 litre </button></li>
                                        </ul>
                                    </div>
                                    <div class="tag-block">
                                        <h4 class="mb-3 wow fadeInUp" data-wow-delay="0.6s">Tags : </h4>
                                        <ul class="mb-3 wow fadeInUp" data-wow-delay="0.6s">
                                            <li>Featured</li>
                                            <li>Fresh</li>
                                            <li>Trending</li>
                                        </ul>
                                    </div>
                                    <div class="customer-rating-box wow fadeInUp">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <span>(Customer Reviews)</span>
                                    </div>
                                    <div class="product-cart-btn wow fadeInUp" data-wow-delay="0.6s">
                                        <div class="qty-box">
                                            <span class="btn">−</span>
                                            <span class="value">1</span>
                                            <span class="btn">+</span>
                                        </div>
                                        <a href="#" class="btn-default"> <i class="fas fa-shopping-cart me-2"></i>Add to cart</a>
                                        <a href="#" class="btn-default"><i class="fa-solid fa-bell  me-2"></i>Subscribe Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="our-faqs dark-section"></div>

<div class="our-quality">
    <div class="container">
        <div class="row section-row">
            <div class="col-lg-12">
                <div class="section-title section-title-center">
                    <h3 class="wow fadeInUp">Quality Experience</h3>
                    <h2 class="text-anime-style-3">Pure dairy products backed by quality promise</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="our-quality-box">
                    <div class="quality-image-content">
                        <div class="quality-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/customer/img/quality-1.jpg') }}" alt="">
                            </figure>
                        </div>
                        <div class="quality-content">
                            <div class="section-title">
                                <h2 class="text-anime-style-3">Pure natural organic essentials</h2>
                                <p class="wow fadeInUp">Our dairy products are crafted using only natural ingredients and methods From pasture-raised cows to chemical-free processing</p>
                            </div>
                        </div>
                    </div>
                    <div class="quality-image-content">
                        <div class="quality-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/customer/img/quality-2.jpg') }}" alt="">
                            </figure>
                        </div>
                        <div class="quality-content">
                            <div class="section-title">
                                <h2 class="text-anime-style-3">Featured recipe</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">Discover our favorite way to enjoy fresh, farm-sourced dairy. Each featured recipe is crafted with wholesome ingredients and rich, natural flavors perfect.</p>
                            </div>
                            <div class="quality-info-list wow fadeInUp" data-wow-delay="0.4s">
                                <ul>
                                    <li>Nutrient-Dense Recipes That Nourish Body and Soul</li>
                                    <li>A Heritage of Flavor, Reimagined for Modern Living</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="quality-image-content">
                        <div class="quality-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/customer/img/quality-3.jpg') }}" alt="">
                            </figure>
                        </div>
                        <div class="quality-content">
                            <div class="section-title">
                                <h2 class="text-anime-style-3">Pure natural organic essentials</h2>
                                <p class="wow fadeInUp">Our dairy products are crafted using only natural ingredients and methods From pasture-raised cows to chemical-free processing</p>
                            </div>
                        </div>
                    </div>
                    <div class="quality-image-content">
                        <div class="quality-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/customer/img/quality-4.jpg') }}" alt="">
                            </figure>
                        </div>
                        <div class="quality-content">
                            <div class="section-title">
                                <h2 class="text-anime-style-3">Featured recipe</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">Discover our favorite way to enjoy fresh, farm-sourced dairy. Each featured recipe is crafted with wholesome ingredients and rich, natural flavors perfect.</p>
                            </div>
                            <div class="quality-info-list wow fadeInUp" data-wow-delay="0.4s">
                                <ul>
                                    <li>Nutrient-Dense Recipes That Nourish Body and Soul</li>
                                    <li>A Heritage of Flavor, Reimagined for Modern Living</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-product our-products">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-6 mb-5">
                <div class="section-title">
                    <h2 class="text-anime-style-3 text-center">Related products</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">

            <div class="col-lg-12">
                <div class="our-product-box">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-item wow fadeInUp mb-5">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> <img src="{{ asset('assets/customer/img/product-1.jpg') }}" alt="milk"></div>
                                    <div class="swiper-slide"> <img src="{{ asset('assets/customer/img/product-1.jpg') }}" alt="milk"></div>
                                </div>

                                <!-- Action Icons -->
                                <div class="product-actions">
                                    <a href="#" class="action-icon" title="Quick View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-icon wishlist" title="Add to Wishlist">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-body">
                                <div class="product-item-content">
                                    <h2><a href="milk-product.html">Milk</a></h2>
                                    <h3 class="product-price">$25.0 <span>$35.00</span></h3>
                                    <p>Our milk is sourced fresh every day from healthy, well-cared-for cows and delivered in its purest form.</p>
                                    <a href="#" class="add-to-cart-btn">
                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-item wow fadeInUp mb-5" data-wow-delay="0.2s">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> <img src="{{ asset('assets/customer/img/product-2.jpg') }}" alt="Pot Curd"></div>
                                    <div class="swiper-slide"> <img src="{{ asset('assets/customer/img/product-2.jpg') }}" alt="Pot Curd"></div>
                                </div>

                                <!-- Action Icons -->
                                <div class="product-actions">
                                    <a href="#" class="action-icon" title="Quick View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-icon wishlist" title="Add to Wishlist">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-body">
                                <div class="product-item-content">
                                    <h2><a href="milk-product.html"> Pot curd</a></h2>
                                    <h3 class="product-price">$25.0 <span>$15.00</span></h3>
                                    <p>Our milk is sourced fresh every day from healthy, well-cared-for cows and delivered in its purest form.</p>
                                    <a href="#" class="add-to-cart-btn">
                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-item wow fadeInUp mb-5" data-wow-delay="0.4s">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> <img src="{{ asset('assets/customer/img/product-3.jpg') }}" alt="egg"></div>
                                    <div class="swiper-slide"> <img src="{{ asset('assets/customer/img/product-3.jpg') }}" alt="egg"></div>
                                </div>

                                <!-- Action Icons -->
                                <div class="product-actions">
                                    <a href="#" class="action-icon" title="Quick View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-icon wishlist" title="Add to Wishlist">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-body">
                                <div class="product-item-content">
                                    <h2><a href="milk-product.html">Country Egg</a></h2>
                                    <h3 class="product-price">$25.0 <span>$35.00</span></h3>
                                    <p>Our milk is sourced fresh every day from healthy, well-cared-for cows and delivered in its purest form.</p>
                                    <a href="#" class="add-to-cart-btn">
                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-item wow fadeInUp mb-5" data-wow-delay="0.6s">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> <img src="{{ asset('assets/customer/img/product-4.png') }}" alt="Cow Ghee"></div>
                                </div>

                                <!-- Action Icons -->
                                <div class="product-actions">
                                    <a href="#" class="action-icon" title="Quick View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-icon wishlist" title="Add to Wishlist">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-body">
                                <div class="product-item-content">
                                    <h2><a href="milk-product.html">Cow ghee</a></h2>
                                    <h3 class="product-price">$25.0 <span>$35.00</span></h3>
                                    <p>Our milk is sourced fresh every day from healthy, well-cared-for cows and delivered in its purest form.</p>
                                    <a href="#" class="add-to-cart-btn">
                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-item wow fadeInUp mb-5" data-wow-delay="0.6s">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> <img src="{{ asset('assets/customer/img/product-5.jpg') }}" alt="Buffalo Ghee"></div>
                                    <div class="swiper-slide"> <img src="{{ asset('assets/customer/img/product-5.jpg') }}" alt="Buffalo Ghee"></div>
                                </div>

                                <!-- Action Icons -->
                                <div class="product-actions">
                                    <a href="#" class="action-icon" title="Quick View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-icon wishlist" title="Add to Wishlist">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-body">
                                <div class="product-item-content">
                                    <h2><a href="milk-product.html">Buffalo ghee</a></h2>
                                    <h3 class="product-price">$25.0 <span>$35.00</span></h3>
                                    <p>Our milk is sourced fresh every day from healthy, well-cared-for cows and delivered in its purest form.</p>
                                    <a href="#" class="add-to-cart-btn">
                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-12 d-none">
            <div class="page-pagination wow fadeInUp" data-wow-delay="1.2s">
                <ul class="pagination">
                    <li><a href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="{{ asset('assets/customer/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/customer/js/validator.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/customer/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('assets/customer/js/parallaxie.js') }}"></script>
<script src="{{ asset('assets/customer/js/gsap.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/magiccursor.js') }}"></script>
<script src="{{ asset('assets/customer/js/SplitText.js') }}"></script>
<script src="{{ asset('assets/customer/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/jquery.mb.YTPlayer.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/function.js') }}"></script>
<script src="{{ asset('assets/customer/js/hizoom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {});

</script>
@endsection

@endsection
