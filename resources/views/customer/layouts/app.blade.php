<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @hasSection('title')
            @yield('title')
        @else
            Dad's Dairy
        @endif
    </title>
    <meta name="description" content="Gooshudh - Buy fresh milk, cup curd, pot curd, country eggs, country chicken, butter, cow ghee, buffalo ghee online. Healthy, natural dairy and farm products delivered to your doorstep.">
    <meta name="keywords" content="Gooshudh, milk, cup curd, pot curd, country eggs, country chicken, butter, cow ghee, buffalo ghee, dairy, farm fresh, natural, healthy, online delivery">
    <meta name="author" content="Gooshudh">
    <meta property="og:title" content="Gooshudh - Fresh Dairy & Farm Products" />
    <meta property="og:description" content="Buy fresh milk, curd, eggs, chicken, butter, ghee and more from Gooshudh. Delivered fresh to your home." />
    <meta property="og:image" content="/assets/images/gooshudh-og.jpg" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Gooshudh - Fresh Dairy & Farm Products" />
    <meta name="twitter:description" content="Buy fresh milk, curd, eggs, chicken, butter, ghee and more from Gooshudh. Delivered fresh to your home." />
    <meta name="twitter:image" content="/assets/images/gooshudh-og.jpg" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('customer.layouts.header')
<div class="row g-0">
    @yield('content')
</div>

@include('customer.layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>