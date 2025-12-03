@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">Coupons Management</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Coupon
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    @if($coupons->isEmpty())
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle"></i> No coupons found. <a href="{{ route('admin.coupons.create') }}">Create one now</a>
        </div>
    @else
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Code</th>
                            <th>Discount</th>
                            <th>Applicable To</th>
                            <th>Valid From</th>
                            <th>Valid Till</th>
                            <th>Usage</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                            <tr>
                                <td>
                                    <span class="badge bg-primary">{{ $coupon->code }}</span>
                                </td>
                                <td>
                                    @if($coupon->discount_type === 'fixed')
                                        <strong>Rs. {{ $coupon->discount_value }}</strong>
                                    @else
                                        <strong>{{ $coupon->discount_value }}%</strong>
                                    @endif
                                </td>
                                <td>
                                    @switch($coupon->applicable_to)
                                        @case('all')
                                            <span class="badge bg-success">All Products</span>
                                            @break
                                        @case('first_order_only')
                                            <span class="badge bg-warning">First Order</span>
                                            @break
                                        @case('subscription_only')
                                            <span class="badge bg-info">Subscriptions</span>
                                            @break
                                        @case('specific_products')
                                            <span class="badge bg-secondary">Specific Products</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    @if($coupon->valid_from)
                                        {{ $coupon->valid_from->format('d M Y') }}
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($coupon->valid_till)
                                        <span class="@if($coupon->valid_till->isPast()) text-danger @endif">
                                            {{ $coupon->valid_till->format('d M Y') }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <small>{{ $coupon->times_used }}/{{ $coupon->max_uses ?? '∞' }}</small>
                                </td>
                                <td>
                                    @if($coupon->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $coupons->links() }}
        </div>
    @endif
</div>

<style>
    .table th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-weight: 600;
        border: none;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(102, 126, 234, 0.05);
    }
</style>
@endsection
