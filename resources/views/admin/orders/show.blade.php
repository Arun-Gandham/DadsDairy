@extends('admin.layouts.app')

@section('title', 'Order Details')

@section('content')
<h1 class="mb-4">Order Details</h1>
<div class="mb-3">
    <span class="text-muted">Order placed at: <strong>{{ $order->created_at->format('d M Y, h:i A') }}</strong></span>
</div>
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
                                    <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    <option value="refund_initiated" {{ $order->status === 'refund_initiated' ? 'selected' : '' }}>Refund Initiated</option>
                                    <option value="refunded" {{ $order->status === 'refunded' ? 'selected' : '' }}>Refunded</option>
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
<div class="card mt-4">
    <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
        <h5 class="mb-0">Order Timeline</h5>
    </div>
    <div class="card-body">
        <div class="timeline">
            @php
                $timelineEvents = $order->timelines()->orderBy('changed_at')->get();
                $statusIcons = [
                    'pending' => 'clock',
                    'processing' => 'spinner',
                    'shipped' => 'truck',
                    'delivered' => 'box-open',
                    'completed' => 'check-circle',
                    'cancelled' => 'times-circle',
                ];
            @endphp
            @foreach($timelineEvents as $event)
                @php
                    $icon = $statusIcons[$event->status] ?? 'circle';
                @endphp
                <div class="d-flex align-items-center mb-2">
                    <div style="flex:1">
                        <i class="fas fa-{{ $icon }}
                            @if($event->state === 'completed') text-success
                            @elseif($event->state === 'cancelled') text-danger
                            @else text-warning
                            @endif
                        "></i>
                        <strong>{{ ucfirst(str_replace('_', ' ', $event->status)) }}</strong>
                        <span class="badge ms-2
                            @if($event->state === 'completed') bg-success
                            @elseif($event->state === 'cancelled') bg-danger
                            @else bg-warning text-dark
                            @endif
                        ">
                            @if($event->state === 'completed')
                                Completed
                            @elseif($event->state === 'cancelled')
                                Cancelled
                            @else
                                In Progress
                            @endif
                        </span>
                        <br><small>{{ $event->changed_at ? $event->changed_at->format('d M Y, h:i A') : $event->created_at->format('d M Y, h:i A') }}</small>
                        @if($event->note)
                            <br><span class="text-muted">{{ $event->note }}</span>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('admin.order-timelines.edit', $event) }}" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                        <form action="{{ route('admin.order-timelines.destroy', $event) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this timeline event?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection