@extends('admin.layouts.app')

@section('title', 'Order Details')

@section('content')
<h1 class="mb-4">Order Details</h1>
<!-- Order details content here -->
    <div class="card mb-4">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <h1 class="mb-4">Order Details</h1>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header"><h5>Customer & Address</h5></div>
                                    <div class="card-body">
                                        <p><strong>Name:</strong> {{ $order->user->name ?? '-' }}</p>
                                        <p><strong>Phone:</strong> {{ $order->phone }}</p>
                                        <p><strong>Email:</strong> {{ $order->email }}</p>
                                        <p><strong>Address:</strong><br>
                                            {{ $order->door_number }}, {{ $order->street }},<br>
                                            {{ $order->city }}, {{ $order->state }} - {{ $order->pin_code }}<br>
                                            <span class="text-muted">({{ $order->delivery_address }})</span>
                                        </p>
                                        <p><strong>Latitude:</strong> {{ $order->latitude ?? '-' }}<br>
                                            <strong>Longitude:</strong> {{ $order->longitude ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header"><h5>Payment & Shipping</h5></div>
                                    <div class="card-body">
                                        <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) ?? '-' }}</p>
                                        <p><strong>Shipping Type:</strong> {{ $order->shipping_option ?? '-' }}</p>
                                        <p><strong>Shipping Cost:</strong> ₹{{ number_format($order->shipping_total, 2) }}</p>
                                        <p><strong>Order Status:</strong> <span class="badge bg-info">{{ ucfirst($order->status) }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Update Order Status</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <td>{{ $item->product->details ?? '-' }}</td>
                                
                                <td>
                                    @if(isset($item->product->weight))
                                    {{ $item->product->weight }}
                                    @else
                                    -
                                    @endif
                                </td>
                                <button type="submit" class="btn btn-gradient">
                                    <i class="fas fa-save"></i> Update Status
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection