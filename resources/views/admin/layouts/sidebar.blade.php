
<div class="sidebar">
    @if(auth()->user()->hasPermission('view_admin_dashboard'))
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i> Dashboard
        </a>
    @endif
    @if(auth()->user()->hasPermission('manage_subscriptions'))
        <a href="{{ route('admin.subscriptions.index') }}" class="{{ request()->is('admin/subscriptions*') ? 'active' : '' }}">
            <i class="fas fa-sync"></i> Subscriptions
        </a>
    @endif

    @if(auth()->user()->hasPermission('view_reports'))
        <a href="{{ route('admin.reports.index') }}" class="{{ request()->is('admin/reports*') ? 'active' : '' }}">
            <i class="fas fa-chart-bar"></i> Reports
        </a>
    @endif

    @if(auth()->user()->hasPermission('manage_products'))
        <a href="{{ route('admin.products') }}" class="{{ request()->is('admin/products*') ? 'active' : '' }}">
            <i class="fas fa-box"></i> Products
        </a>
    @endif

    @if(auth()->user()->hasPermission('manage_categories'))
        <a href="{{ route('admin.categories.index') }}" class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
            <i class="fas fa-list"></i> Categories
        </a>
    @endif

    @if(auth()->user()->hasPermission('manage_orders'))
        <a href="{{ route('admin.orders') }}" class="{{ request()->is('admin/orders*') ? 'active' : '' }}">
            <i class="fas fa-shopping-cart"></i> Orders
        </a>
    @endif

    @if(auth()->user()->hasPermission('manage_users'))
        <a href="{{ route('admin.users') }}" class="{{ request()->is('admin/users*') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Users
        </a>
    @endif

    @if(auth()->user()->hasPermission('manage_roles'))
        <a href="{{ route('admin.permissions.index') }}" class="{{ request()->is('admin/permissions*') ? 'active' : '' }}">
            <i class="fas fa-lock"></i> Permissions
        </a>
    @endif
</div>

