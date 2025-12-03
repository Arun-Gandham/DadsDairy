<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - Dad's Dairy Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 22px;
            cursor: pointer;
        }
        .sidebar {
            background: white;
            min-height: calc(100vh - 60px);
            padding: 20px 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar a {
            color: #333;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }
        .sidebar a:hover {
            background: #f8f9fa;
            border-left-color: #667eea;
            color: #667eea;
        }
        .sidebar a.active {
            background: #f0f0f0;
            border-left-color: #667eea;
            color: #667eea;
            font-weight: bold;
        }
        .main-content {
            padding: 30px;
        }
        .page-title {
            color: #333;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 28px;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-gradient:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        .category-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-left: 4px solid #667eea;
            transition: all 0.3s;
        }
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .category-card h5 {
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .category-card p {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .badge-count {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 3px 8px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">🥛 Dad's Dairy - Admin</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">{{ Auth::user()->email }}</h6></li>
                            <li><hr class="dropdown-divider"></li>

                            <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> My Profile</a></li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
                                </form>
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2">
            <div class="sidebar">
                <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                <a href="{{ route('admin.products') }}"><i class="fas fa-box"></i> Products</a>
                <a href="{{ route('admin.categories.index') }}" class="active"><i class="fas fa-list"></i> Categories</a>
                <a href="{{ route('admin.coupons.index') }}"><i class="fas fa-ticket"></i> Coupons</a>
                <a href="{{ route('admin.orders') }}"><i class="fas fa-shopping-cart"></i> Orders</a>
                <a href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Users</a>
                <a href="{{ route('admin.permissions.index') }}"><i class="fas fa-lock"></i> Permissions</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="main-content">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <h1 class="d-inline-block ms-3 page-title">Categories</h1>
                    </div>

                    <a href="{{ route('admin.categories.create') }}" class="btn btn-gradient">
                        <i class="fas fa-plus"></i> Add Category
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($categories->count() > 0)
                    <div class="category-grid">
                        @foreach ($categories as $category)
                            <div class="category-card">
                                <h5>{{ $category->name }}</h5>
                                <p>{{ $category->description ?? 'No description' }}</p>

                                <div class="mb-3">
                                    <span class="badge-count">
                                        <i class="fas fa-box"></i> {{ $category->products->count() }} Products
                                    </span>
                                </div>

                                <div class="btn-group w-100">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="width: 50%;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger w-100" onclick="return confirm('Delete this category?');">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> No categories found.
                        <a href="{{ route('admin.categories.create') }}">Create one now</a>
                    </div>
                @endif

            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
