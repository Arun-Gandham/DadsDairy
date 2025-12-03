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

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">🥛 Dad's Dairy Admin</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">

                            <li><h6 class="dropdown-header">{{ Auth::user()->email }}</h6></li>
                            <li><hr class="dropdown-divider"></li>

                            <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> My Profile</a></li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">
                                        <i class="fa fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <div class="row g-0">

        <!-- SIDEBAR -->
        <div class="col-md-2">
            <div class="sidebar">

                <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>

                <a href="{{ route('admin.products') }}" class="{{ request()->is('admin/products*') ? 'active' : '' }}">
                    <i class="fas fa-box"></i> Products
                </a>

                <a href="{{ route('admin.categories.index') }}" class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
                    <i class="fas fa-list"></i> Categories
                </a>

                <a href="{{ route('admin.coupons.index') }}" class="{{ request()->is('admin/coupons*') ? 'active' : '' }}">
                    <i class="fas fa-ticket"></i> Coupons
                </a>

                <a href="{{ route('admin.orders') }}" class="{{ request()->is('admin/orders*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart"></i> Orders
                </a>

                <a href="{{ route('admin.users') }}" class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Users
                </a>

                <a href="{{ route('admin.permissions.index') }}" class="{{ request()->is('admin/permissions*') ? 'active' : '' }}">
                    <i class="fas fa-lock"></i> Permissions
                </a>

            </div>
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
