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
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/hizoom.min.css">

@endsection
@section('content')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-3">About Us</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="our-scrolling-ticker">
    <div class="scrolling-ticker-box">
        <div class="scrolling-content">
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Sustainable Farming</span>

            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Grass-Fed Cows</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Planet-Conscious Practices</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Nutrient-Rich Milk</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Ethical Animal Care</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Sustainable Farming</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Sustainable Farming</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Grass-Fed Cows</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Planet-Conscious Practices</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Nutrient-Rich Milk</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Ethical Animal Care</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Sustainable Farming</span>
        </div>
        <div class="scrolling-content">
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Sustainable Farming</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Grass-Fed Cows</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Planet-Conscious Practices</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Nutrient-Rich Milk</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Ethical Animal Care</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Sustainable Farming</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Sustainable Farming</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Grass-Fed Cows</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Planet-Conscious Practices</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Nutrient-Rich Milk</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Ethical Animal Care</span>
            <span><img src="{{ asset('assets/customer/img/icon-sparkle.svg') }}" alt="">Sustainable Farming</span>
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
                </div>
            </div>
        </div>
    </div>
</div>
<div class="our-approach dark-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="approach-content">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Our approach</h3>
                        <h2 class="text-anime-style-3">Spreading wellness with every drop of milk</h2>
                    </div>
                    <div class="approach-item-list">
                        <div class="approach-item approach-highlighted-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-approach-1.svg') }}" alt="">
                            </div>
                            <div class="approach-item-content">
                                <h3>Our mission</h3>
                                <p>At Milk farm, our vision is to promote a healthier and lifestyle by delivering milk that's pure, fresh, and ethically sourced. </p>
                            </div>
                        </div>
                        <div class="approach-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-approach-2.svg') }}" alt="">
                            </div>
                            <div class="approach-item-content">
                                <h3>Our vision</h3>
                                <p> We take pride in delivering top quality dairy products that our customers love.</p>
                            </div>
                        </div>
                        <div class="approach-item wow fadeInUp" data-wow-delay="0.6s">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-approach-3.svg') }}" alt="">
                            </div>
                            <div class="approach-item-content">
                                <h3>our value</h3>
                                <p>We take pride in delivering top quality dairy products that our customers love.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="approach-image">
                    <figure class="image-anime reveal">
                        <img src="{{ asset('assets/customer/img/about-01.jpg') }}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="our-approach new-approach-block">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <div class="approach-image">
                    <figure class="image-anime reveal">
                        <img src="{{ asset('assets/customer/img/about-01.jpg') }}" alt="">
                    </figure>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="approach-content">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Our approach</h3>
                        <h2 class="text-anime-style-3">Spreading wellness with every drop of milk</h2>
                    </div>
                    <div class="approach-item-list">
                        <div class="approach-item approach-highlighted-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-approach-1.svg') }}" alt="">

                            </div>
                            <div class="approach-item-content">
                                <h3>Our mission</h3>
                                <p class="black-text">At Milk farm, our vision is to promote a healthier and lifestyle by delivering milk that's pure, fresh, and ethically sourced. </p>
                            </div>
                        </div>
                        <div class="approach-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-approach-2.svg') }}" alt="">
                            </div>
                            <div class="approach-item-content">
                                <h3>Our vision</h3>
                                <p class="black-text">We take pride in delivering top quality dairy products that our customers love.</p>
                            </div>
                        </div>
                        <div class="approach-item wow fadeInUp" data-wow-delay="0.6s">
                            <div class="icon-box">
                                <img src="{{ asset('assets/customer/img/icon-approach-3.svg') }}" alt="">
                            </div>
                            <div class="approach-item-content">
                                <h3>our value</h3>
                                <p class="black-text">We take pride in delivering top quality dairy products that our customers love.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
<div class="faqs-block  dark-section parallaxie" style="background-image:url({{ asset('assets/customer/img/faqs-img.jpg') }});">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="our-faqs-content">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Frequently asked questions</h3>
                        <h2 class="text-anime-style-3">Everything you need to know about our dairy</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Got questions? We've got answers. From how our milk is processed and delivered to details about our cows, sustainability efforts, and quality standards.</p>
                    </div>
                    <div class="faq-accordion" id="accordion">
                        <div class="accordion-item wow fadeInUp">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    Is your milk 100% natural and free from additives?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <figure class="image-anime">
                                        <img src="{{ asset('assets/customer/img/faqs-accordion-img.jpg') }}" alt="">
                                    </figure>
                                    <p>Our milk is source directly from healthy pasture raised cows and goats, and is completely free from artificial additives, preservatives, and growth hormones. We never compromise on quality.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    How do you ensure the quality and safety of your milk?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse show" aria-labelledby="heading2" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <figure class="image-anime">
                                        <img src="{{ asset('assets/customer/img/faqs-accordion-img.jpg') }}" alt="">
                                    </figure>
                                    <p>Our milk is source directly from healthy pasture raised cows and goats, and is completely free from artificial additives, preservatives, and growth hormones. We never compromise on quality.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Do you offer home delivery services?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <figure class="image-anime">
                                        <img src="{{ asset('assets/customer/img/faqs-accordion-img.jpg') }}" alt="">
                                    </figure>
                                    <p>Our milk is source directly from healthy pasture raised cows and goats, and is completely free from artificial additives, preservatives, and growth hormones. We never compromise on quality.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-contact-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="contact-us-content">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">contact us</h3>
                        <h2 class="text-anime-style-3">Stay direct connected with milkofarm today</h2>
                    </div>
                    <div class="contact-info-box">
                        <div class="contact-info-list">
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/customer/img/icon-phone-primary.svg') }}" alt="">
                                </div>
                                <div class="contact-item-content">
                                    <h3>Contact</h3>
                                    <p><a href="tel:254882963">(+91) 254-882-963</a></p>
                                </div>
                            </div>
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.4s">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/customer/img/icon-mail-primary.svg') }}" alt="">
                                </div>
                                <div class="contact-item-content">
                                    <h3>Email</h3>
                                    <p><a href="mailto:support@domainname.com">support@domainname.com</a></p>
                                </div>
                            </div>
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.6s">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/customer/img/icon-location-primary.svg') }}" alt="">
                                </div>
                                <div class="contact-item-content">
                                    <h3>Address</h3>
                                    <p>Near Sunrise Highway, Anandpur - MH 400123</p>
                                </div>
                            </div>
                        </div>
                        <div class="contact-social-links wow fadeInUp" data-wow-delay="0.8s">
                            <h3>Follow Us Today :</h3>
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-us-form dark-section">
                    <div class="section-title">
                        <h2 class="text-anime-style-3">Send a message</h2>
                    </div>
                    <div class="contact-form">
                        <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-12 mb-5">
                                    <textarea name="message" class="form-control" id="message" rows="4" placeholder="Message..."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn-default" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit Message</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popup -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="success-pulse">✔</div>
                <h3 class="text-center"> Your Form Submitted Successfully</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- end-testimonial-section -->
@section('scripts')
<script src="{{ asset('assets/customer/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/bootstrap.min.js') }}"></script>
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
<script>
    $('.hi1').hiZoom({
        width: 450
        , position: 'right'
    });
    $('.hi2').hiZoom({
        width: 400
        , position: 'right'
    });

</script>
<script>
    function changeImage(thumbnail) {
        const mainImage = document.getElementById("mainProductImage");
        mainImage.src = thumbnail.src;
    }

</script>


@endsection
