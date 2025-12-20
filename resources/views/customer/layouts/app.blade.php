<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Goo Shudh</title>
    <!-- Favicon Icon -->
    <link href="{{ asset('assets/customer/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">

    <link href="{{ asset('assets/customer/css/custom.css') }}" rel="stylesheet" media="screen">
    <link rel="icon" href="{{ asset('assets/customer/img/favicon.png') }}" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    @yield('head')
</head>

<body>
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

    @include('customer.layouts.header')
    @yield('content')
    @include('customer.layouts.footer')
    @yield('scripts')
    <script src="{{ asset('assets/customer/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/customer/js/function.js') }}"></script>
</body>

</html>
