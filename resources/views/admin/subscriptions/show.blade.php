@extends('admin.layouts.app')
@section('title', 'Subscription Details')
@section('content')
<h1>Subscription Details</h1>
<table class="table">
    <tr><th>Customer</th><td>{{ $subscription->user->name }}</td></tr>
    <tr><th>Product</th><td>{{ $subscription->product->name }}</td></tr>
    <tr><th>Start Date</th><td>{{ $subscription->start_date }}</td></tr>
    <tr><th>Frequency</th><td>{{ ucfirst($subscription->frequency) }}</td></tr>
    <tr><th>Status</th><td>{{ ucfirst($subscription->status) }}</td></tr>
    <tr><th>Next Delivery</th><td>{{ $subscription->next_delivery_date }}</td></tr>
    <tr><th>Quantity</th><td>{{ $subscription->quantity }}</td></tr>
    <tr><th>Notes</th><td>{{ $subscription->notes }}</td></tr>
</table>
<form method="POST" action="{{ route('admin.subscriptions.update', $subscription->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="active" @if($subscription->status=='active') selected @endif>Active</option>
            <option value="paused" @if($subscription->status=='paused') selected @endif>Paused</option>
            <option value="cancelled" @if($subscription->status=='cancelled') selected @endif>Cancelled</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Status</button>
</form>
<a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary mt-3">Back to Subscriptions</a>
@endsection
