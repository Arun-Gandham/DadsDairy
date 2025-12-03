@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">Edit Profile</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('customer.profile.show') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-user-edit"></i> Update Your Information</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('customer.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone" class="form-label fw-bold">Phone Number</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                   id="phone" name="phone" placeholder="e.g., +91 98765 43210"
                                   value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label fw-bold">Delivery Address</label>
                            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                                      rows="4" placeholder="Enter your complete delivery address">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>

                        <!-- Password Section -->
                        <h6 class="fw-bold mb-3">Change Password <span class="text-muted">(Optional)</span></h6>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" placeholder="Leave blank to keep current password">
                            <small class="text-muted">Must be at least 8 characters</small>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                   id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password">
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                            <a href="{{ route('customer.profile.show') }}" class="btn btn-outline-secondary">
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
                        <i class="fas fa-info-circle text-info"></i> Tips
                    </h5>
                    <div class="alert alert-info">
                        <strong>Keep Your Information Updated</strong>
                        <p>Make sure your email address and phone number are correct so we can contact you about your orders.</p>
                    </div>
                    <div class="alert alert-warning">
                        <strong>Delivery Address</strong>
                        <p>Your delivery address will be used as default for future orders. You can change it during checkout.</p>
                    </div>
                    <div class="alert alert-success">
                        <strong>Password Security</strong>
                        <p>Use a strong password with a mix of letters, numbers, and special characters.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
