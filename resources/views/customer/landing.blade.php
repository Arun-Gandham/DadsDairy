@extends('customer.layouts.app')

@section('title', "Welcome to Dad's Dairy")
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">Welcome to Dad's Dairy!</h1>
            <p class="lead mb-4">Fresh dairy products delivered to your doorstep. Choose your subscription plan, explore our products, and enjoy healthy living.</p>
            <a href="" class="btn btn-primary btn-lg">Shop Now</a>
            <a href="" class="btn btn-outline-success btn-lg ms-2">View Subscription Plans</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-4 text-center">
            <img src="/assets/images/fresh-milk.png" alt="Fresh Milk" class="img-fluid mb-2" style="max-height:120px;">
            <h5>Fresh Milk</h5>
            <p>Delivered daily from local farms.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="/assets/images/curd.png" alt="Curd" class="img-fluid mb-2" style="max-height:120px;">
            <h5>Pure Curd</h5>
            <p>Rich, creamy, and natural taste.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="/assets/images/ghee.png" alt="Ghee" class="img-fluid mb-2" style="max-height:120px;">
            <h5>Premium Ghee</h5>
            <p>Traditional preparation for authentic flavor.</p>
        </div>
    </div>
</div>
@endsection
