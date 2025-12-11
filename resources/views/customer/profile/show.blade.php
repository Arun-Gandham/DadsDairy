@extends('customer.layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 col-4 border-end">
                            <!-- Vertical Nav Pills -->
                            <div class="nav flex-column nav-pills me-3 text-start" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active mb-2 text-start" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</button>
                                <button class="nav-link mb-2 text-start" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</button>
                                <button class="nav-link mb-2 text-start" id="v-pills-subscriptions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-subscriptions" type="button" role="tab" aria-controls="v-pills-subscriptions" aria-selected="false">Subscriptions</button>
                                <button class="nav-link text-start" id="v-pills-contact-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contact" type="button" role="tab" aria-controls="v-pills-contact" aria-selected="false">Contact Us</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Tab Content -->
                            <div class="tab-content text-start" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h5>Profile Details</h5>
                                    <p>Name: {{ auth()->user()->name }}</p>
                                    <p>Email: {{ auth()->user()->email }}</p>
                                    <!-- Add more profile fields as needed -->
                                </div>
                                <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                                    <h5>My Orders</h5>
                                    <p>Order history will be shown here.</p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-subscriptions" role="tabpanel" aria-labelledby="v-pills-subscriptions-tab">
                                    <h5>My Subscriptions</h5>
                                    <p>Subscription details will be shown here.</p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                                    <h5>Contact Us</h5>
                                    <p>Email: support@dadsdairy.com</p>
                                    <p>Phone: 123-456-7890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
