<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dad\'s Dairy')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Add Bootstrap or other CSS here -->
</head>
<body>
    @include('partials.navbar')
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
