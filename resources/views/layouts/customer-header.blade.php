{{-- resources/views/layouts/customer-header.blade.php --}}
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">🥛 Dad's Dairy</a>
        <div class="ms-auto d-flex align-items-center gap-3">
            <span class="text-white">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-light ms-2" style="font-weight: 600;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>
