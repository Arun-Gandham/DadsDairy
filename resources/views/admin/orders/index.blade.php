@extends('admin.layouts.app')

@section('title', 'Orders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="d-inline-block ms-3">Orders</h1>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td><strong>{{ $order->order_number }}</strong></td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>₹{{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No orders found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
