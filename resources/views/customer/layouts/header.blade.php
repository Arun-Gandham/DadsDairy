<div class="preloader">
    <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon"><img src="{{ asset('assets/customer/img/logo.png') }}" alt="Logo"></div>
    </div>
</div>
<header class="main-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('customer.landing') }}">
                    <img src="{{ asset('assets/customer/img/logo.png') }}" alt="Logo" width="80">
                </a>
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item"><a class="nav-link" href="{{ route('customer.landing') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('customer.aboutus') }}">About Us</a>
                            <li class="nav-item"><a class="nav-link" href="{{ route('customer.products') }}">Products</a>
                            <li class="nav-item"><a class="nav-link" href="#">Our Story</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('customer.contactus') }}">Contact Us</a></li>

                        </ul>
                    </div>
                    @guest
                    <div class="header-btn">
                        <a href="{{ route('customer.login') }}" class="btn-default">Login</a>
                    </div>
                    @endguest
                    @auth
                    <div class="header-profile">
                        <a href="#" class="profile-btn">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <div class="profile-dropdown">
                            <a href="{{ route('customer.profile.show') }}" class="profile-link">
                                <i class="fa-solid fa-user"></i> My Profile
                            </a>
                            <a href="{{ route('customer.logout') }}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </a>
                            <form id="logout-form" method="POST" action="{{ route('customer.logout') }}" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </nav>
        <button class="menu-btn d-lg-none d-xl-none d-xxl-none d-block" onclick="toggleSidebar()">☰</button>
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <span class="close-btn" onclick="toggleSidebar()">×</span>
            <ul>
                <li class="nav-item"><a href="{{ route('customer.landing') }}">Home</a></li>

                <li class="nav-item"><a href="{{ route('customer.aboutus') }}">About Us</a></li>

                <li class="nav-item"><a href="our-story.html">Our Story</a></li>
                <li class="nav-item"><a href="{{ route('customer.products') }}">Products</a></li>

                <li class="nav-item"><a href="{{ route('customer.contactus') }}">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="#">My Profile</a></li>
            </ul>
        </div>
    </div>
</header>
