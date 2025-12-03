@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-user text-white" style="font-size: 2.5rem;"></i>
                    </div>
                    <h5>{{ Auth::user()->name }}</h5>
                    <small class="text-muted">{{ Auth::user()->email }}</small>
                    <div class="mt-3">
                        <a href="{{ route('customer.profile.edit') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Edit Profile
                        </a>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('customer.dashboard') }}" class="text-decoration-none"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="mt-2"><a href="{{ route('customer.orders') }}" class="text-decoration-none"><i class="fas fa-list"></i> My Orders</a></li>
                        <li class="mt-2"><a href="{{ route('customer.cart') }}" class="text-decoration-none"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                        <li class="mt-2"><a href="{{ route('customer.subscriptions.index') }}" class="text-decoration-none"><i class="fas fa-sync"></i> Subscriptions</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-user-circle"></i> My Profile</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="fw-bold text-muted">Full Name</h6>
                            <p class="fs-5">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold text-muted">Email Address</h6>
                            <p class="fs-5">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="fw-bold text-muted">Phone Number</h6>
                            <p class="fs-5">{{ Auth::user()->phone ?? 'Not provided' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold text-muted">Account Role</h6>
                            <p class="fs-5">
                                <span class="badge bg-primary">{{ Auth::user()->roles()->first()->name ?? 'Customer' }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold text-muted">Delivery Address</h6>
                        <p class="fs-5">{{ Auth::user()->address ?? 'Not provided' }}</p>
                    </div>

                    <hr>

                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="card bg-light border-0">
                                <div class="card-body text-center">
                                    <h4 class="text-primary">
                                        <i class="fas fa-box"></i>
                                    </h4>
                                    <h6>Total Orders</h6>
                                    <p class="mb-0 h5">{{ Auth::user()->orders()->count() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-light border-0">
                                <div class="card-body text-center">
                                    <h4 class="text-success">
                                        <i class="fas fa-check-circle"></i>
                                    </h4>
                                    <h6>Completed</h6>
                                    <p class="mb-0 h5">{{ Auth::user()->orders()->where('status', 'delivered')->count() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-light border-0">
                                <div class="card-body text-center">
                                    <h4 class="text-warning">
                                        <i class="fas fa-sync"></i>
                                    </h4>
                                    <h6>Active Subscriptions</h6>
                                    <p class="mb-0 h5">{{ Auth::user()->subscriptions()->where('status', 'active')->count() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-light border-0">
                                <div class="card-body text-center">
                                    <h4 class="text-danger">
                                        <i class="fas fa-clock"></i>
                                    </h4>
                                    <h6>Pending Orders</h6>
                                    <p class="mb-0 h5">{{ Auth::user()->orders()->whereIn('status', ['pending', 'processing'])->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-top">
                        <a href="{{ route('customer.profile.edit') }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Profile
                        </a>
                        <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #5568d3 0%, #6a3a8a 100%);
    }

    a {
        color: #667eea;
    }

    a:hover {
        color: #764ba2;
    }
</style>
@endsection
