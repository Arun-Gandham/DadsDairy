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

