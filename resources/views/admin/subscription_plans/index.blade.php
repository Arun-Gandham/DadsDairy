@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1>Subscription Plans</h1>
    <a href="{{ route('admin.subscription_plans.create') }}" class="btn btn-primary mb-3">Add New Plan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Duration (days)</th>
                <th>Price per Unit</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plans as $plan)
            <tr>
                <td>{{ $plan->name }}</td>
                <td>{{ $plan->duration_days }}</td>
                <td>₹{{ number_format($plan->price_per_unit, 2) }}</td>
                <td>{{ $plan->active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('admin.subscription_plans.edit', $plan) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.subscription_plans.destroy', $plan) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this plan?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
