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
    <meta name="description" content="Goo Shudh (Gooshudh) – Buy fresh milk, cup curd, pot curd, country eggs, country chicken, butter, cow ghee & buffalo ghee online. Pure, natural dairy and farm products delivered to your doorstep.">

    <meta name="keywords" content="Goo Shudh, GooShudh, Goo-Shudh, Gooshudh, Go Shudh dairy, fresh milk online, curd, pot curd, cup curd, cow ghee, buffalo ghee, country eggs, dairy delivery, natural farm products">

    <meta name="author" content="Goo Shudh">

    <meta property="og:title" content="Goo Shudh – Fresh Dairy & Farm Products" />
    <meta property="og:description" content="Order fresh milk, curd, eggs, butter & ghee from Goo Shudh (Gooshudh). 100% natural dairy products delivered fresh to your home." />
    <meta property="og:image" content="/assets/images/gooshudh-og.jpg" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Goo Shudh – Fresh Dairy & Farm Products" />
    <meta name="twitter:description" content="Buy pure milk, curd, eggs, chicken, butter & ghee from Goo Shudh (Gooshudh). Delivered fresh daily." />
    <meta name="twitter:image" content="/assets/images/gooshudh-og.jpg" />

    <link rel="canonical" href="{{ url()->current() }}" />
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "Brand",
    "name": "Goo Shudh",
    "alternateName": ["Gooshudh", "Goo-Shudh", "Goo Shudh Dairy"],
    "url": "https://gooshudh.com",
    "logo": "https://gooshudh.com/assets/images/gooshudh-og.jpg",
    "sameAs": [
        "https://instagram.com/gooshudh",
        "https://facebook.com/gooshudh"
    ],
    "description": "Goo Shudh (Gooshudh) delivers fresh milk, curd, eggs, ghee, butter and natural farm products."
    }
    </script>
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