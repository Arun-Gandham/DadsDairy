@extends('customer.layouts.app')
@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<title>Goo SHUDH</title>
<!-- Favicon Icon -->
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
@endsection
@section('content')
<div class="swiper hero-slider">
    <div class="swiper-wrapper">

        <div class="swiper-slide">
            <div class="hero hero-bg-image dark-section parallaxie" style="background-image:url('{{ asset('assets/customer/img/slider-1.jpg') }}')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="hero-content">
                                <div class="section-title">
                                    <h3>Pure Dairy Goodness</h3>
                                    <h1 class="text-anime-style-3">Fresh Milk From Local Farmers</h1>
                                    <p>Healthy, fresh, and chemical-free milk straight from our farm.</p>
                                </div>
                                <a href="#" class="btn-default">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="hero hero-bg-image dark-section parallaxie" style="background-image:url('{{ asset('assets/customer/img/slider-2.jpg') }}')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="hero-content">
                                <div class="section-title">
                                    <h3>Country Eggs</h3>
                                    <h1 class="text-anime-style-3">100% Organic Country Eggs</h1>
                                    <p>Farm-fresh eggs packed with protein and natural nutrition.</p>
                                </div>
                                <a href="#" class="btn-default">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="hero hero-bg-image dark-section parallaxie" style="background-image:url('{{ asset('assets/customer/img/slider-3.jpg') }}')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="hero-content">
                                <div class="section-title">
                                    <h3>Fresh Organic Ghee</h3>
                                    <h1 class="text-anime-style-3">Made From Pure Cow and Buffalo Ghee</h1>
                                    <p>Traditional method ghee, great aroma & perfect taste.</p>
                                </div>
                                <a href="#" class="btn-default">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<div class="our-product">
    <div class="container-fluid">
        <div class="row section-row align-items-center">
            <div class="col-lg-12">
                <div class="section-title section-title-center">
                    <h3>Our Products</h3>
                    <h2>Explore our range of fresh dairy products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="our-product-box owl-carousel owl-theme">

                    <div class="product-item">
                        <img src="{{ asset('assets/customer/img/product-1.jpg') }}" alt="Milk">
                        <div class="product-overlay">
                            <h2>Milk</h2>
                            <p>Fresh and pure farm milk, naturally delicious.</p>
                        </div>
                    </div>
                    <div class="product-item">
                        <img src="{{ asset('assets/customer/img/product-2.jpg') }}" alt="Pot Curd">
                        <div class="product-overlay">
                            <h2>Pot Curd</h2>
                            <p>Rich and creamy pot curd, perfect for meals.</p>
                        </div>
                    </div>
                    <div class="product-item">
                        <img src="{{ asset('assets/customer/img/product-3.jpg') }}" alt="Country Egg">
                        <div class="product-overlay">
                            <h2>Country Egg</h2>
                            <p>Organic country eggs with natural taste.</p>
                        </div>
                    </div>
                    <div class="product-item">
                        <img src="{{ asset('assets/customer/img/product-4.png') }}" alt="Cow Ghee">
                        <div class="product-overlay">
                            <h2>Cow Ghee</h2>
                            <p>Pure cow ghee, rich aroma and high quality.</p>
                        </div>
                    </div>
                    <div class="product-item">
                        <img src="{{ asset('assets/customer/img/product-5.jpg') }}" alt="Buffalo Ghee">
                        <div class="product-overlay">
                            <h2>Buffalo Ghee</h2>
                            <p>Pure cow ghee, rich aroma and high quality.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="why-choose-us">
    <div class="container">
        <div class="row section-row">
            <div class="section-title section-title-center">
                <h3 class="wow fadeInUp">Why Choose Us</h3>
                <h2 class="text-anime-style-3">Reliable laboratory results you can trust</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 order-lg-1 order-1">

                <div class="why-choose-box">
                    <div class="why-choose-item wow fadeInUp">

                        <div class="icon-box">
                            <img src="{{ asset('assets/customer/img/icon-why-choose-1.svg') }}" alt="">
                        </div>
                        <div class="why-choose-content">
                            <h3>Commitment to 100% Natural</h3>
                            <p>We provide dairy that's completely free from </p>
                        </div>
                    </div>
                    <div class="why-choose-item wow fadeInUp" data-wow-delay="0.2s">

                        <div class="icon-box">
                            <img src="{{ asset('assets/customer/img/icon-why-choose-2.svg') }}" alt="">
                        </div>
                        <div class="why-choose-content">
                            <h3>Farm-Fresh Milk Every Day</h3>
                            <p>We provide dairy that's completely free from </p>
                        </div>
                    </div>
                    <div class="why-choose-item wow fadeInUp" data-wow-delay="0.4s">

                        <div class="icon-box">
                            <img src="{{ asset('assets/customer/img/icon-why-choose-3.svg') }}" alt="">
                        </div>
                        <div class="why-choose-content">
                            <h3>Pure, Natural, No Chemicals</h3>
                            <p>We provide dairy that's completely free from </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-2 order-3">

                <div class="why-choose-image">
                    <img src="{{ asset('assets/customer/img/logo.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 order-lg-3 order-2">

                <div class="why-choose-box">
                    <div class="why-choose-item wow fadeInUp">

                        <div class="icon-box">
                            <img src="{{ asset('assets/customer/img/icon-why-choose-4.svg') }}" alt="">
                        </div>
                        <div class="why-choose-content">
                            <h3>Rigorous Quality Control</h3>
                            <p>We provide dairy that's completely free from </p>
                        </div>
                    </div>
                    <div class="why-choose-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon-box">
                            <img src="{{ asset('assets/customer/img/icon-why-choose-5.svg') }}" alt="">
                        </div>
                        <div class="why-choose-content">
                            <h3>Eco-Friendly Farming Practices</h3>
                            <p>We provide dairy that's completely free from </p>
                        </div>
                    </div>
                    <div class="why-choose-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon-box">
                            <img src="{{ asset('assets/customer/img/icon-why-choose-6.svg') }}" alt="">
                        </div>
                        <div class="why-choose-content">
                            <h3>Trusted By Thousands Daily</h3>
                            <p>We provide dairy that's completely free from </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="intro-video dark-section parallaxie">
    <div class="container">
        <div class="row section-row mb-0">
            <div class="col-lg-12">
                <div class="section-title section-title-center">
                    <h3 class="wow fadeInUp">our story</h3>
                    <h2 class="text-anime-style-3">Our passionate story of fresh dairy farming</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="intro-video-box">
                    <div class="video-play-circle">
                        <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" data-cursor-text="Play"><img src="images/video-play-circle.svg" alt=""></a>
                    </div>
                    <div class="intro-video-item-list">
                        <div class="intro-video-item wow fadeInUp">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-intro-video-1.svg') }}" alt="">
                            </div>
                            <div class="intro-video-content">
                                <h3>Farm-Fresh Quality Guaranteed</h3>
                                <p>Our milk is sourced directly from our own farm, ensuring the freshest & highest quality.</p>
                            </div>
                        </div>
                        <div class="intro-video-item wow fadeInUp" data-wow-delay="0.25s">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-intro-video-2.svg') }}" alt="">
                            </div>
                            <div class="intro-video-content">
                                <h3>100% Natural and Pure</h3>
                                <p>We offer reliable doorstep delivery of milk and dairy products—fresh every morning.</p>
                            </div>
                        </div>
                        <div class="intro-video-item wow fadeInUp" data-wow-delay="0.5s">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-intro-video-3.svg') }}" alt="">
                            </div>
                            <div class="intro-video-content">
                                <h3>Eco-Friendly Packaging</h3>
                                <p>We offer reliable doorstep delivery of milk and dairy products—fresh every morning.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-us-images">
                    <div class="about-image-box">
                        <div class="about-image-1">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/customer/img/about-us-image-1.jpg') }}" alt="">
                            </figure>
                        </div>
                    </div>

                    <div class="about-image-2">
                        <figure class="image-anime">
                            <img src="{{ asset('assets/customer/img/about-us-image-2.jpg') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-us-content">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">About us</h3>
                        <h2 class="text-anime-style-3">Fresh milk straight from our pasture to your table</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">We're more than just a farm - we're your neighbors. We're proud to be part of the local community, providing families with wholesome dairy that's produced just down the road. Our cows are pasture-raised.</p>
                    </div>
                    <div class="about-us-body">
                        <div class="about-us-list wow fadeInUp" data-wow-delay="0.4s">
                            <h3>Our Mission:</h3>
                            <ul>
                                <li>Ensures the health and welfare of our animals.</li>
                                <li>Pure, Wholesome Dairy Products You Can Trust.</li>
                                <li>Deliver fresh, high-quality dairy products by caring.</li>
                            </ul>
                        </div>
                        <div class="years-experience-box">
                            <h2><span class="counter">80</span>+</h2>
                            <p>Years Of Experience</p>
                        </div>
                    </div>
                    <div class="about-item-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="about-us-item">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-about-us-item-1.svg') }}" alt="">
                            </div>
                            <div class="about-us-item-content">
                                <h3>Driven by Tradition, Guided by Innovation</h3>
                            </div>
                        </div>
                        <div class="about-us-item">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-about-us-item-2.svg') }}" alt="">
                            </div>
                            <div class="about-us-item-content">
                                <h3>Committed to Sustainable & Ethical Farming</h3>
                            </div>
                        </div>
                    </div>
                    <div class="about-us-btn wow fadeInUp" data-wow-delay="0.8s">
                        <a href="#" class="btn-default">learn more about</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="our-faqs dark-section"></div>
<div class="about-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-us-content">
                    <div class="section-title">
                        <h3 class="wow fadeInUp"> Who we are</h3>
                        <h2 class="text-anime-style-3">Fresh milk straight from our pasture to your table</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">We're more than just a farm - we're your neighbors. We're proud to be part of the local community, providing families with wholesome dairy that's produced just down the road. Our cows are pasture-raised.</p>
                    </div>
                    <div class="about-us-body">
                        <div class="about-us-list wow fadeInUp" data-wow-delay="0.4s">
                            <h3>Our Mission:</h3>
                            <ul>
                                <li>Ensures the health and welfare of our animals.</li>
                                <li>Pure, Wholesome Dairy Products You Can Trust.</li>
                                <li>Deliver fresh, high-quality dairy products by caring.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="about-us-btn wow fadeInUp" data-wow-delay="0.8s">
                        <a href="#" class="btn-default">learn more about</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-us-images">
                    <div class="about-image-box">
                        <div class="about-image-1">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/customer/img/about-us-image-1.jpg') }}" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="about-image-2">
                        <figure class="image-anime">
                            <img src="{{ asset('assets/customer/img/about-us-image-2.jpg') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="core-values-section">
    <div class="container-fluid">
        <div class="text-center mb-5">
            <h2 class="core-values-title">Our Core Values</h2>
        </div>
        <div class="row g-4 justify-content-center mt-5">
            <div class="col-6 col-md-6 col-lg-3 p-0">
                <div class="value-card">
                    <img src="{{ asset('assets/customer/img/core-value-1.jpg') }}" alt="Purity First" />
                    <div class="value-overlay">
                        <h5>Purity First</h5>
                        <p>No preservatives, no shortcuts</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 p-0">
                <div class="value-card">
                    <img src="{{ asset('assets/customer/img/core-value-2.jpg') }}" alt="Tradition in Every Step" />
                    <div class="value-overlay">
                        <h5>Tradition in Every Step</h5>
                        <p>Ancient methods, modern hygiene</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 p-0">
                <div class="value-card">
                    <img src="{{ asset('assets/customer/img/core-value-3.jpg') }}" alt="Farm Fresh Promise" />
                    <div class="value-overlay">
                        <h5>Farm Fresh Promise</h5>
                        <p>Small batches, direct from farms</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 p-0">
                <div class="value-card">
                    <img src="{{ asset('assets/customer/img/core-value-4.jpg') }}" alt="Honesty & Transparency" />
                    <div class="value-overlay">
                        <h5>Honesty & Transparency</h5>
                        <p>What you see is what you get</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="about-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-us-images">
                    <div class="about-image-box">
                        <div class="about-image-1">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/customer/img/about-us-image-1.jpg') }}" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="about-image-2">
                        <figure class="image-anime">
                            <img src="{{ asset('assets/customer/img/about-us-image-2.jpg') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-us-content">
                    <div class="section-title">
                        <h3 class="wow fadeInUp"> Who we are</h3>
                        <h2 class="text-anime-style-3">Fresh milk straight from our pasture to your table</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">We're more than just a farm - we're your neighbors. We're proud to be part of the local community, providing families with wholesome dairy that's produced just down the road. Our cows are pasture-raised.</p>
                    </div>
                    <div class="about-us-body">
                        <div class="about-us-list wow fadeInUp" data-wow-delay="0.4s">
                            <h3>Our Mission:</h3>
                            <ul>
                                <li>Ensures the health and welfare of our animals.</li>
                                <li>Pure, Wholesome Dairy Products You Can Trust.</li>
                                <li>Deliver fresh, high-quality dairy products by caring.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="about-us-btn wow fadeInUp" data-wow-delay="0.8s">
                        <a href="#" class="btn-default">learn more about</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="our-testimonials dark-section parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="our-testimonial-content">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our testimonials</h3>
                        <h2 class="text-anime-style-3">Real feedback from families and businesses we serve</h2>
                    </div>
                    <div class="testimonial-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper" data-cursor-text="Drag">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-company-logo">
                                            <img src="{{ asset('assets/customer/img/company-logo-1.svg') }}" alt="">
                                        </div>
                                        <div class="testimonial-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore nemo ipsam ad deleniti dolorem officia explicabo delectus magnam perspiciatis fugiat in voluptas quia provident obcaecati earum et cupiditate, tempora minus.</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="{{ asset('assets/customer/img/author-1.jpg') }}" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>Title comes here</h3>
                                                <p>Designation</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-company-logo">
                                            <img src="{{ asset('assets/customer/img/company-logo-1.svg') }}" alt="">
                                        </div>
                                        <div class="testimonial-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, culpa maiores! Odio dignissimos maiores sint accusamus harum, quaerat dicta distinctio est esse, fuga deserunt sequi at velit, quos obcaecati numquam.</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="{{ asset('assets/customer/img/author-1.jpg') }}" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>Title comes here</h3>
                                                <p>Designation</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-btn">
                                <div class="testimonial-button-prev"></div>
                                <div class="testimonial-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonials-image-box">
                    <div class="testimonials-image">
                        <figure class="image-anime">
                            <img src="{{ asset('assets/customer/img/testimonials-image.jpg') }}" alt="">
                        </figure>
                    </div>
                    <div class="trusted-clients-box wow fadeInUp">
                        <div class="trusted-clients-images">
                            <div class="trusted-clients-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('assets/customer/img/trusted-clients-img-1.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="trusted-clients-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('assets/customer/img/trusted-clients-img-2.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="trusted-clients-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('assets/customer/img/trusted-clients-img-3.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="trusted-clients-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('assets/customer/img/trusted-clients-img-4.jpg') }}" alt="">
                                </figure>
                            </div>
                        </div>
                        <div class="trusted-clients-content">
                            <p>Trusted by 3,000+ Happy Milk Lovers Worldwide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="our-scrolling-ticker">
    <div class="scrolling-ticker-box">
        <div class="scrolling-content">
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Milk</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">pot curd</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">country egg</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">cow ghee</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">buffalo ghee</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Milk</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">pot curd</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">country egg</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">cow ghee</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">buffalo ghee</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Milk</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">pot curd</span>
        </div>
        <div class="scrolling-content">
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Milk</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">pot curd</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">country egg</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">cow ghee</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">buffalo ghee</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Milk</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">pot curd</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">country egg</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">cow ghee</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">buffalo ghee</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Milk</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">pot curd</span>
        </div>
    </div>
</div>
<!-- Scrolling Ticker Section End -->
<!-- testimonial-section -->
<section class="testimonial-one-section">
    <div class="testimonial-one-container">
        <h2 class="testimonial-one-title">What Our Clients Say</h2>
        <div class="testimonial-one-slider">
            <div class="testimonial-one-slide active">
                <div class="testimonial-one-card">
                    <div class="testimonial-one-img">
                        <img src="https://i.pravatar.cc/100?img=1" alt="">
                    </div>
                    <div class="testimonial-one-content">
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Very professional service and great support."
                        </p>
                        <h4>Ramesh Kumar</h4>
                        <span>Business Owner</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-one-slide">
                <div class="testimonial-one-card">
                    <div class="testimonial-one-img">
                        <img src="https://i.pravatar.cc/100?img=2" alt="">
                    </div>
                    <div class="testimonial-one-content">
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Exceptional quality and customer service."
                        </p>
                        <h4>Anita Sharma</h4>
                        <span>Marketing Manager</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-one-slide">
                <div class="testimonial-one-card">
                    <div class="testimonial-one-img">
                        <img src="https://i.pravatar.cc/100?img=3" alt="">
                    </div>
                    <div class="testimonial-one-content">
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Highly recommend to anyone looking for quality."
                        </p>
                        <h4>Rahul Verma</h4>
                        <span>Startup Founder</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-one-nav">
            <button onclick="testimonialOnePrev()">‹</button>
            <button onclick="testimonialOneNext()">›</button>
        </div>
    </div>
</section>
<!-- end-testimonial-section -->

@endsection
<!-- end-testimonial-section -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll(".testimonial-slide");

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove("active"));
        slides[index].classList.add("active");
    }

    function nextTestimonial() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    function prevTestimonial() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    }
    /* Auto slide */
    setInterval(nextTestimonial, 5000);

</script>
<script>
    var swiper = new Swiper(".hero-slider", {
        loop: true
        , speed: 1000
        , autoplay: {
            delay: 4000
            , disableOnInteraction: false
        , }
        , pagination: {
            el: ".swiper-pagination"
            , clickable: true
        , }
        , navigation: {
            nextEl: ".swiper-button-next"
            , prevEl: ".swiper-button-prev"
        , }
        , effect: "fade"
    , });

</script>
<script>
    $(document).ready(function() {
        $('.our-product-box').owlCarousel({
            loop: true
            , margin: 20
            , nav: false
            , dots: true
            , autoplay: true
            , autoplayTimeout: 4000
            , autoplayHoverPause: true
            , responsive: {
                0: {
                    items: 1
                }
                , 576: {
                    items: 2
                }
                , 768: {
                    items: 2
                }
                , 1200: {
                    items: 4
                }
            }
            , navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"]
        });
    });

</script>
<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("active");
        document.getElementById("mainContent").classList.toggle("shift");
    }

</script>
<script>
    function toggleProfile() {
        document.getElementById("profileDropdown").classList.toggle("active");
    }
    // Close dropdown when clicking outside
    document.addEventListener("click", function(e) {
        const profile = document.querySelector(".header-profile");
        if (!profile.contains(e.target)) {
            document.getElementById("profileDropdown").classList.remove("active");
        }
    });

</script>
<script>
    let testimonialOneIndex = 0;
    const testimonialOneSlides = document.querySelectorAll(".testimonial-one-slide");

    function testimonialOneShow(index) {
        testimonialOneSlides.forEach(slide => slide.classList.remove("active"));
        testimonialOneSlides[index].classList.add("active");
    }

    function testimonialOneNext() {
        testimonialOneIndex = (testimonialOneIndex + 1) % testimonialOneSlides.length;
        testimonialOneShow(testimonialOneIndex);
    }

    function testimonialOnePrev() {
        testimonialOneIndex = (testimonialOneIndex - 1 + testimonialOneSlides.length) % testimonialOneSlides.length;
        testimonialOneShow(testimonialOneIndex);
    }
    /* Auto slide */
    setInterval(testimonialOneNext, 5000);

</script>

@endsection
