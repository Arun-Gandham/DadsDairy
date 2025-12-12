@extends('customer.layouts.app')

@section('title', "Welcome to Dad's Dairy")
@section('content')
    <div class="main-content">
        <div class="container">
            <h1 class="mb-4">Checkout</h1>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Order Details</h5>

                            <form action="{{ route('customer.orders.store') }}" method="POST" id="checkoutForm">
                                                                                                <input type="hidden" name="delivery_address" id="delivery_address">
                                                                @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul class="mb-0">
                                                                            @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-2">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" maxlength="20" placeholder="Enter phone number" value="{{ Auth::user()->phone ?? '' }}" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" maxlength="100" placeholder="Enter email address" value="{{ Auth::user()->email ?? '' }}" required>
                                    </div>
                                </div>
                                <!-- Delivery type removed -->

                                <div class="mb-3" id="address_section">
                                    <div class="row g-2">
                                        <div class="col-md-6 mb-2">
                                            <label for="door_number" class="form-label">Door Number</label>
                                            <input type="text" class="form-control" id="door_number" name="door_number" maxlength="20" placeholder="Enter door number">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="street" class="form-label">Street</label>
                                            <input type="text" class="form-control" id="street" name="street" maxlength="50" placeholder="Enter street">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="area" class="form-label">Area</label>
                                            <input type="text" class="form-control" id="area" name="area" maxlength="50" placeholder="Enter area">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control" id="city" name="city" maxlength="50" placeholder="Enter city">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="state" class="form-label">State</label>
                                            <input type="text" class="form-control" id="state" name="state" maxlength="50" placeholder="Enter state">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="pin_code" class="form-label">Pin Code</label>
                                            <input type="text" class="form-control" id="pin_code" name="pin_code" maxlength="10" placeholder="Enter pin code">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6>Payment Method</h6>
                                    <div class="form-check mb-3">
                                        <input type="radio" name="payment_method" value="cash" id="cash" class="form-check-input" required>
                                        <input type="radio" name="payment_method" value="cash" id="cash" class="form-check-input" required checked>
                                        <label for="cash" class="form-check-label">
                                            Cash on Delivery
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="radio" name="payment_method" value="card" id="card" class="form-check-input" required>
                                        <label for="card" class="form-check-label">
                                            UPI/Debit/Credit Card
                                        </label>
                                    </div>
                                </div>

                                <hr>

                                <h6 class="mb-3">Order Items</h6>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>₹{{ number_format($item->price, 2) }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </form>
                            <script>
                            document.getElementById('checkoutForm').addEventListener('submit', function(e) {
                                // Combine address fields
                                const door = document.getElementById('door_number').value.trim();
                                const street = document.getElementById('street').value.trim();
                                const area = document.getElementById('area').value.trim();
                                const city = document.getElementById('city').value.trim();
                                const state = document.getElementById('state').value.trim();
                                const pin = document.getElementById('pin_code').value.trim();
                                let address = '';
                                if (door) address += door + ', ';
                                if (street) address += street + ', ';
                                if (area) address += area + ', ';
                                if (city) address += city + ', ';
                                if (state) address += state + ', ';
                                if (pin) address += pin;
                                address = address.replace(/, $/, '');
                                document.getElementById('delivery_address').value = address;
                            });
                            </script>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Coupon Section -->
                            <div class="coupon-section">
                                <h6 class="mb-3">
                                    <i class="fas fa-ticket-alt"></i> Apply Coupon
                                </h6>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="coupon_code" placeholder="Enter coupon code" maxlength="50">
                                    <button class="btn btn-outline-primary" type="button" id="applyCouponBtn" onclick="validateCoupon()">
                                        <i class="fas fa-check"></i> Apply
                                    </button>
                                </div>
                                <div id="couponMessage"></div>
                            </div>

                            <!-- Order Summary -->
                            <h5 class="card-title">Order Summary</h5>
                            <hr>
                            <div class="summary-row">
                                <span>Subtotal</span>
                                <span id="subtotal">₹{{ number_format($totalPrice, 2) }}</span>
                            </div>
                            <div class="summary-row" id="discountRow" style="display: none;">
                                <span id="discountLabel">Discount</span>
                                <span id="discountAmount"></span>
                            </div>
                            <div class="summary-row">
                                <span>Tax (18%)</span>
                                <span id="tax">₹{{ number_format($totalPrice * 0.18, 2) }}</span>
                            </div>
                            <div class="summary-row">
                                <span>Shipping</span>
                                <span>Free</span>
                            </div>
                            <div class="summary-row total">
                                <span>Total</span>
                                <span id="total">₹{{ number_format($totalPrice * 1.18, 2) }}</span>
                            </div>

                            <!-- Hidden input for coupon code -->
                            <input type="hidden" name="coupon_code" id="appliedCouponCode" form="checkoutForm">

                            <button type="submit" class="btn btn-gradient w-100 btn-lg mt-4" form="checkoutForm">
                                <i class="fas fa-check-circle"></i> Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let subtotal = {{ $totalPrice }};
        let appliedCoupon = null;

        // Delivery type and toggleAddress JS removed

        function validateCoupon() {
            const couponCode = document.getElementById('coupon_code').value.trim();
            const messageDiv = document.getElementById('couponMessage');

            if (!couponCode) {
                messageDiv.innerHTML = '<div class="alert alert-warning mb-0" role="alert"><small>Please enter a coupon code</small></div>';
                return;
            }

            const btn = document.getElementById('applyCouponBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Validating...';

            fetch('{{ route("customer.validate-coupon") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    coupon_code: couponCode,
                    order_total: subtotal,
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.valid) {
                    appliedCoupon = data;
                    document.getElementById('appliedCouponCode').value = data.coupon_code;

                    // Update UI
                    messageDiv.innerHTML = '<div class="alert alert-success mb-0" role="alert"><small><i class="fas fa-check-circle"></i> ' + data.message + '</small></div>';

                    // Show discount
                    const discountRow = document.getElementById('discountRow');
                    discountRow.style.display = '';
                    document.getElementById('discountLabel').textContent = `Discount (${data.discount_type === 'percentage' ? data.discount_value + '%' : 'Rs. ' + data.discount_value})`;
                    document.getElementById('discountAmount').textContent = '- ₹' + data.discount_amount.toFixed(2);

                    // Recalculate total
                    updateTotal();

                    // Disable coupon input
                    document.getElementById('coupon_code').disabled = true;
                    btn.disabled = true;
                    btn.innerHTML = '<i class="fas fa-check"></i> Applied';
                } else {
                    messageDiv.innerHTML = '<div class="alert alert-danger mb-0" role="alert"><small><i class="fas fa-exclamation-circle"></i> ' + data.message + '</small></div>';
                    appliedCoupon = null;
                    document.getElementById('appliedCouponCode').value = '';
                    document.getElementById('discountRow').style.display = 'none';
                    updateTotal();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                messageDiv.innerHTML = '<div class="alert alert-danger mb-0" role="alert"><small>An error occurred. Please try again.</small></div>';
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-check"></i> Apply';
            });
        }

        function updateTotal() {
            const discountAmount = appliedCoupon ? appliedCoupon.discount_amount : 0;
            const beforeTax = subtotal - discountAmount;
            const tax = beforeTax * 0.18;
            const total = beforeTax + tax;

            document.getElementById('subtotal').textContent = '₹' + subtotal.toFixed(2);
            document.getElementById('tax').textContent = '₹' + tax.toFixed(2);
            document.getElementById('total').textContent = '₹' + total.toFixed(2);
        }

        // Allow Enter key to apply coupon
        document.getElementById('coupon_code').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                validateCoupon();
            }
        });
    </script>
@endsection
