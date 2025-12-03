@extends('admin.layouts.app')

@section('title', 'Orders')

@section('content')
<h1 class="mb-4">Orders</h1>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-hover">
    <thead>
        <tr>
            <th>Order #</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
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
        @endforeach
    </tbody>
</table>
@endsection
