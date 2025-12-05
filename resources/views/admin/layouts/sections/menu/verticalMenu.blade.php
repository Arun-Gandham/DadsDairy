<style>
  .menu-link i {
    margin-right: 12px;
  }
</style>
@php
$configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  @if(!isset($navbarFull))
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        @include('_partials.macros',["height"=>20])
      </span>
      <span class="app-brand-text demo menu-text fw-bold">{{config('variables.templateName')}}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>
  @endif


  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    @if(auth()->user()->hasPermission('view_admin_dashboard'))
      <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
          <i class="fas fa-home"></i>
          <div style="display:inline-block;">Dashboard</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->hasPermission('manage_subscriptions'))
      <li class="menu-item {{ request()->is('admin/subscriptions*') ? 'active' : '' }}">
        <a href="{{ route('admin.subscriptions.index') }}" class="menu-link">
          <i class="fas fa-sync"></i>
          <div style="display:inline-block;">Subscriptions</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->hasPermission('view_reports'))
      <li class="menu-item {{ request()->is('admin/reports*') ? 'active' : '' }}">
        <a href="{{ route('admin.reports.index') }}" class="menu-link">
          <i class="fas fa-chart-bar"></i>
          <div style="display:inline-block;">Reports</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->hasPermission('manage_coupons') || auth()->user()->hasPermission('view_coupons'))
      <li class="menu-item {{ request()->is('admin/coupons*') ? 'active' : '' }}">
        <a href="{{ route('admin.coupons.index') }}" class="menu-link">
          <i class="fas fa-ticket-alt"></i>
          <div style="display:inline-block;">Coupons</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->hasPermission('manage_products'))
      <li class="menu-item {{ request()->is('admin/products*') ? 'active' : '' }}">
        <a href="{{ route('admin.products') }}" class="menu-link">
          <i class="fas fa-box"></i>
          <div style="display:inline-block;">Products</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->hasPermission('manage_categories'))
      <li class="menu-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
        <a href="{{ route('admin.categories.index') }}" class="menu-link">
          <i class="fas fa-list"></i>
          <div style="display:inline-block;">Categories</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->hasPermission('manage_orders'))
      <li class="menu-item {{ request()->is('admin/orders*') ? 'active' : '' }}">
        <a href="{{ route('admin.orders') }}" class="menu-link">
          <i class="fas fa-shopping-cart"></i>
          <div style="display:inline-block;">Orders</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->hasPermission('manage_users'))
      <li class="menu-item {{ request()->is('admin/users*') ? 'active' : '' }}">
        <a href="{{ route('admin.users') }}" class="menu-link">
          <i class="fas fa-users"></i>
          <div style="display:inline-block;">Users</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->hasPermission('manage_roles'))
      <li class="menu-item {{ request()->is('admin/roles*') ? 'active' : '' }}">
        <a href="{{ route('admin.roles.index') }}" class="menu-link">
          <i class="fas fa-user-shield"></i>
          <div style="display:inline-block;">Roles</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->hasPermission('manage_roles') || auth()->user()->hasPermission('manage_permissions'))
      <li class="menu-item {{ request()->is('admin/permissions*') ? 'active' : '' }}">
        <a href="{{ route('admin.permissions.index') }}" class="menu-link">
          <i class="fas fa-lock"></i>
          <div style="display:inline-block;">Permissions</div>
        </a>
      </li>
    @endif
    @if(auth()->user()->hasPermission('manage_settings'))
      <li class="menu-item {{ request()->is('admin/settings*') ? 'active' : '' }}">
        <a href="{{ route('admin.settings.index') }}" class="menu-link">
          <i class="fas fa-cog"></i>
          <div style="display:inline-block;">Settings</div>
        </a>
      </li>
    @endif
  </ul>

</aside>