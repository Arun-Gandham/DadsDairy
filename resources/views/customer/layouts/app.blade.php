<!DOCTYPE html>
<html lang="zxx">
<head>
    @yield('head')
</head>
<body>
    @include('customer.layouts.header')
    @yield('content')
    @include('customer.layouts.footer')
    @yield('scripts')
</body>
</html>