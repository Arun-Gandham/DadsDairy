<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Dad's Dairy Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 22px;
            cursor: pointer;
        }
        .sidebar {
            background: #fff;
            min-height: calc(100vh - 60px);
            padding-top: 25px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.08);
        }
        .sidebar a {
            color: #333;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: all 0.3s;
            font-size: 15px;
        }
        .sidebar a:hover {
            background: #f8f9fa;
            color: #667eea;
            border-left-color: #667eea;
        }
        .sidebar a.active {
            background: #f0f0f0;
            color: #667eea;
            font-weight: bold;
            border-left-color: #667eea;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white !important;
        }
        .main-content {
            padding: 30px;
        }
    </style>

    @stack('styles')
</head>

<body>

    @include('admin.layouts.navbar')

    <div class="row g-0">

        <!-- SIDEBAR -->
        <div class="col-md-2">
            @include('admin.layouts.sidebar')
        </div>

        <!-- MAIN PAGE CONTENT -->
        <div class="col-md-10">
            <div class="main-content">

                @yield('content')

            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>

