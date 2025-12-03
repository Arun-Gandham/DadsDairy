<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Dad's Dairy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .main-content {
            padding: 30px;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .coupon-section {
            background: #f0f4ff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .discount-badge {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-top: 10px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .summary-row.total {
            font-weight: bold;
            font-size: 1.1rem;
            border: none;
            color: #667eea;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">🥛 Dad's Dairy</a>
            <div class="ms-auto">
                <span class="text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="container">
            <h1 class="mb-4">Checkout</h1>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Order Details</h5>

                            <form action="{{ route('customer.orders.store') }}" method="POST" id="checkoutForm">
                                @csrf

                                <div class="mb-4">
                                    <h6>Delivery Information</h6>
                                    <div class="form-check mb-3">
                                        <input type="radio" name="delivery_type" value="home_delivery" id="home_delivery" class="form-check-input" required onchange="toggleAddress()">
                                        <label for="home_delivery" class="form-check-label">
                                            Home Delivery
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="radio" name="delivery_type" value="pickup" id="pickup" class="form-check-input" required onchange="toggleAddress()">
                                        <label for="pickup" class="form-check-label">
                                            Pickup from Store
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3" id="address_section" style="display: none;">
                                    <label for="delivery_address" class="form-label">Delivery Address</label>
                                    <textarea name="delivery_address" id="delivery_address" class="form-control" rows="3" placeholder="Enter your delivery address">{{ Auth::user()->address }}</textarea>
                                    @error('delivery_address')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <h6>Payment Method</h6>
                                    <div class="form-check mb-3">
                                        <input type="radio" name="payment_method" value="cash" id="cash" class="form-check-input" required>
                                        <label for="cash" class="form-check-label">
                                            Cash on Delivery
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="radio" name="payment_method" value="card" id="card" class="form-check-input" required>
                                        <label for="card" class="form-check-label">
                                            Debit/Credit Card
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

                                <button type="submit" class="btn btn-gradient w-100 btn-lg">
                                    <i class="fas fa-check-circle"></i> Place Order
                                </button>
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

        function toggleAddress() {
            const addressSection = document.getElementById('address_section');
            const deliveryType = document.querySelector('input[name="delivery_type"]:checked')?.value;
            if (deliveryType === 'home_delivery') {
                addressSection.style.display = 'block';
                document.getElementById('delivery_address').required = true;
            } else {
                addressSection.style.display = 'none';
                document.getElementById('delivery_address').required = false;
            }
        }

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
</body>
</html>
