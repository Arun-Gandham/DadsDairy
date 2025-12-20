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

    <link rel="icon" href="{{ asset('assets/customer/img/favicon.png') }}" type="image/png" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@100..800&amp;display=swap" rel="stylesheet">
    @yield('head')
</head>

<body>
    @include('customer.layouts.header')
    @yield('content')
    @include('customer.layouts.footer')
    @yield('scripts')
</body>

</html>
