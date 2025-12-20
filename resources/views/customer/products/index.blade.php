@extends('customer.layouts.app')

@section('title', "Welcome to Dad's Dairy")
@section('head')
<link rel="icon" href="img/favicon.png" type="image/png" />
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


@endsection
@section('content')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-3">All Products</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-product our-products">
    <div class="container">
        <div class="row justify-content-end ">
            <div class="col-lg-3 col-12 mb-5">
                <div class="product-search">
                    <input type="text" placeholder="Search products...">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-12">
                <div class="our-product-box">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-item wow fadeInUp mb-5">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
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
                                    <h2><a href="{{ url('products/1') }}">Milk</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}"> Pot curd</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Country Egg</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Cow ghee</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Buffalo ghee</a></h2>
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
                        <div class="product-item wow fadeInUp mb-5">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
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
                                    <h2><a href="{{ url('products/1') }}">Milk</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}"> Pot curd</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Country Egg</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Cow ghee</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Buffalo ghee</a></h2>
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
                        <div class="product-item wow fadeInUp mb-5">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
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
                                    <h2><a href="{{ url('products/1') }}">Milk</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}"> Pot curd</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Country Egg</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Cow ghee</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Buffalo ghee</a></h2>
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
                        <div class="product-item wow fadeInUp mb-5">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
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
                                    <h2><a href="{{ url('products/1') }}">Milk</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}"> Pot curd</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Country Egg</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Cow ghee</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Buffalo ghee</a></h2>
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
                        <div class="product-item wow fadeInUp mb-5">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
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
                                    <h2><a href="{{ url('products/1') }}">Milk</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}"> Pot curd</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Country Egg</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Cow ghee</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Buffalo ghee</a></h2>
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
                        <div class="product-item wow fadeInUp mb-5">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
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
                                    <h2><a href="{{ url('products/1') }}">Milk</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}"> Pot curd</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Country Egg</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Cow ghee</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Buffalo ghee</a></h2>
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
                        <div class="product-item wow fadeInUp mb-5">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
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
                                    <h2><a href="{{ url('products/1') }}">Milk</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}"> Pot curd</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Country Egg</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Cow ghee</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Buffalo ghee</a></h2>
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
                        <div class="product-item wow fadeInUp mb-5">
                            <div class="product-image swiper mySwiper">
                                <div class="swiper-wrapper">
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
                                    <h2><a href="{{ url('products/1') }}">Milk</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}"> Pot curd</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Country Egg</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Cow ghee</a></h2>
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
                                    <h2><a href="{{ url('products/1') }}">Buffalo ghee</a></h2>
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

{{-- <div class="row g-0">
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
        <h1 class="mb-4">Our Products</h1>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="product-card">
                    <div class="product-image">
                        🥛
                    </div>
                    <div class="product-info">
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-price">₹{{ number_format($product->price, 2) }}</div>
                        <p class="text-muted small mb-3">{{ Str::limit($product->description, 50) }}</p>
                        <p class="text-muted small mb-3">
                            <strong>Stock:</strong> {{ $product->quantity }} units
                        </p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('customer.products.show', $product) }}" class="btn btn-outline-primary btn-sm">
                                View Details
                            </a>
                            @if (in_array($product->id, $cartItems ?? []))
                            <a href="{{ route('customer.cart') }}" class="btn btn-gradient btn-sm">
                                <i class="fas fa-check"></i> In Cart
                            </a>
                            @else
                            <form action="{{ route('customer.cart.add', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-gradient btn-sm w-100">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">No products available</div>
            </div>
            @endforelse
        </div>

        {{ $products->links() }}
    </div>
</div>
</div> --}}
@section('scripts')
<!-- Jquery Library File -->
<script src="{{ asset('assets/customer/js/jquery-3.7.1.min.js') }}"></script>

<!-- Bootstrap js file -->
<script src="{{ asset('assets/customer/js/bootstrap.min.js') }}"></script>

<!-- Validator js file -->
<script src="{{ asset('assets/customer/js/validator.min.js') }}"></script>

<!-- SlickNav js file -->
<script src="{{ asset('assets/customer/js/jquery.slicknav.js') }}"></script>
<!-- Swiper js file -->
<script src="{{ asset('assets/customer/js/swiper-bundle.min.js') }}"></script>
<!-- Counter js file -->
<script src="{{ asset('assets/customer/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/jquery.counterup.min.js') }}"></script>
<!-- Magnific js file -->
<script src="{{ asset('assets/customer/js/jquery.magnific-popup.min.js') }}"></script>
<!-- SmoothScroll -->
<script src="{{ asset('assets/customer/js/SmoothScroll.js') }}"></script>
<!-- Parallax js -->
<script src="{{ asset('assets/customer/js/parallaxie.js') }}"></script>
<!-- MagicCursor js file -->
<script src="{{ asset('assets/customer/js/gsap.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/magiccursor.js') }}"></script>
<!-- Text Effect js file -->
<script src="{{ asset('assets/customer/js/SplitText.js') }}"></script>
<script src="{{ asset('assets/customer/js/ScrollTrigger.min.js') }}"></script>
<!-- YTPlayer js File -->
<script src="{{ asset('assets/customer/js/jquery.mb.YTPlayer.min.js') }}"></script>
<!-- Wow js file -->
<script src="{{ asset('assets/customer/js/wow.min.js') }}"></script>
<!-- Main Custom js file -->
<script src="{{ asset('assets/customer/js/function.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {});

</script>

@endsection
@endsection
