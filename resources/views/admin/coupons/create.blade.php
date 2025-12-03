@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">Create New Coupon</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('admin.coupons.store') }}" method="POST">
                        @csrf

                        <!-- Coupon Code -->
                        <div class="mb-3">
                            <label for="code" class="form-label fw-bold">Coupon Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror"
                                   id="code" name="code" placeholder="e.g., SAVE20" value="{{ old('code') }}" required>
                            @error('code')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Must be unique and alphanumeric</small>
                        </div>

                        <!-- Discount Type & Value -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="discount_type" class="form-label fw-bold">Discount Type <span class="text-danger">*</span></label>
                                <select class="form-select @error('discount_type') is-invalid @enderror"
                                        id="discount_type" name="discount_type" required>
                                    <option value="">Select Type</option>
                                    <option value="fixed" @selected(old('discount_type') === 'fixed')>Fixed Amount</option>
                                    <option value="percentage" @selected(old('discount_type') === 'percentage')>Percentage</option>
                                </select>
                                @error('discount_type')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="discount_value" class="form-label fw-bold">Discount Value <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('discount_value') is-invalid @enderror"
                                       id="discount_value" name="discount_value" step="0.01" min="0"
                                       placeholder="e.g., 20" value="{{ old('discount_value') }}" required>
                                @error('discount_value')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Applicable To -->
                        <div class="mb-3">
                            <label for="applicable_to" class="form-label fw-bold">Applicable To <span class="text-danger">*</span></label>
                            <select class="form-select @error('applicable_to') is-invalid @enderror"
                                    id="applicable_to" name="applicable_to" required>
                                <option value="">Select Applicability</option>
                                <option value="all" @selected(old('applicable_to') === 'all')>All Products</option>
                                <option value="first_order_only" @selected(old('applicable_to') === 'first_order_only')>First Order Only</option>
                                <option value="subscription_only" @selected(old('applicable_to') === 'subscription_only')>Subscriptions Only</option>
                                <option value="specific_products" @selected(old('applicable_to') === 'specific_products')>Specific Products</option>
                            </select>
                            @error('applicable_to')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Specific Products (Hidden by default) -->
                        <div class="mb-3" id="specific_products_container" style="display: none;">
                            <label for="applicable_product_ids" class="form-label fw-bold">Select Products</label>
                            <select class="form-select" id="applicable_product_ids" name="applicable_product_ids[]" multiple>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}"
                                            @if(is_array(old('applicable_product_ids')) && in_array($product->id, old('applicable_product_ids'))) selected @endif>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold Ctrl/Cmd to select multiple products</small>
                        </div>                        <!-- Validity Period -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="valid_from" class="form-label fw-bold">Valid From</label>
                                <input type="date" class="form-control @error('valid_from') is-invalid @enderror"
                                       id="valid_from" name="valid_from" value="{{ old('valid_from') }}">
                                @error('valid_from')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="valid_till" class="form-label fw-bold">Valid Till</label>
                                <input type="date" class="form-control @error('valid_till') is-invalid @enderror"
                                       id="valid_till" name="valid_till" value="{{ old('valid_till') }}">
                                @error('valid_till')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Usage Limits -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="max_uses" class="form-label fw-bold">Max Uses (Total)</label>
                                <input type="number" class="form-control @error('max_uses') is-invalid @enderror"
                                       id="max_uses" name="max_uses" min="1" placeholder="Leave empty for unlimited"
                                       value="{{ old('max_uses') }}">
                                @error('max_uses')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="usage_per_user" class="form-label fw-bold">Uses Per User <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('usage_per_user') is-invalid @enderror"
                                       id="usage_per_user" name="usage_per_user" min="1" value="{{ old('usage_per_user', 1) }}" required>
                                @error('usage_per_user')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Min Order Value -->
                        <div class="mb-3">
                            <label for="min_order_value" class="form-label fw-bold">Minimum Order Value (Rs.)</label>
                            <input type="number" class="form-control @error('min_order_value') is-invalid @enderror"
                                   id="min_order_value" name="min_order_value" step="0.01" min="0"
                                   placeholder="Leave empty for no minimum" value="{{ old('min_order_value') }}">
                            @error('min_order_value')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Active Status -->
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                                       @checked(old('is_active', true))>
                                <label class="form-check-label" for="is_active">
                                    Active
                                </label>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Coupon
                            </button>
                            <a href="{{ route('admin.coupons.index') }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Sidebar -->
        <div class="col-lg-4">
            <div class="card shadow-sm bg-light">
                <div class="card-body">
                    <h5 class="card-title mb-3">
                        <i class="fas fa-info-circle text-info"></i> Help
                    </h5>
                    <div class="alert alert-info mb-3">
                        <strong>Discount Types:</strong>
                        <ul class="mb-0 mt-2">
                            <li><strong>Fixed:</strong> Flat amount off (e.g., Rs. 50)</li>
                            <li><strong>Percentage:</strong> % off total (e.g., 20%)</li>
                        </ul>
                    </div>
                    <div class="alert alert-info">
                        <strong>Applicability:</strong>
                        <ul class="mb-0 mt-2">
                            <li><strong>All:</strong> Works on all products</li>
                            <li><strong>First Order:</strong> New customers only</li>
                            <li><strong>Subscriptions:</strong> Subscription items only</li>
                            <li><strong>Specific:</strong> Selected products only</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const applicableTo = document.getElementById('applicable_to');
    const specificProductsContainer = document.getElementById('specific_products_container');

    // Toggle specific products input based on selection
    applicableTo.addEventListener('change', function() {
        if (this.value === 'specific_products') {
            specificProductsContainer.style.display = 'block';
        } else {
            specificProductsContainer.style.display = 'none';
        }
    });

    // Trigger on page load if value is set
    if (applicableTo.value === 'specific_products') {
        specificProductsContainer.style.display = 'block';
    }
</script>

<style>
    .form-label {
        color: #333;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #5568d3 0%, #6a3a8a 100%);
    }
</style>
@endsection
