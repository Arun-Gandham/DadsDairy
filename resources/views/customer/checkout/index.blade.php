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
                                <div class="mb-4">
                                    <h6>Delivery Information</h6>
                                    <div class="form-check mb-3">
                                        <input type="radio" name="delivery_type" value="home_delivery" id="home_delivery" class="form-check-input" required onchange="toggleAddress()" checked>
                                        <label for="home_delivery" class="form-check-label">
                                            Home Delivery
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3" id="address_section" style="display: none;">
                                    <div class="row g-2">
                                        <div class="col-md-4 mb-2">
                                            <label for="door_number" class="form-label">Door Number</label>
                                            <input type="text" class="form-control" id="door_number" name="door_number" maxlength="20" placeholder="Enter door number">
                                        </div>
                                        <div class="col-md-8 mb-2">
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
                                        <div class="col-md-6 mb-2">
                                            <label for="latitude" class="form-label">Latitude</label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" readonly>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="longitude" class="form-label">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <label class="form-label mb-0">Pick Location on Map</label>
                                            <button type="button" class="btn btn-outline-primary btn-sm" id="locateMeBtn" style="font-weight:600;">
                                                <i class="fas fa-crosshairs"></i> Locate Me
                                            </button>
                                        </div>
                                        <div id="map" style="height: 220px; width: 100%;"></div>
                                        <small class="text-muted">Click on the map or use the <b>Locate Me</b> button to select your delivery location.</small>
                                    </div>
                                    <script>
                                    let map, marker;
                                    function initMap() {
                                        map = new google.maps.Map(document.getElementById('map'), {
                                            center: { lat: 20.5937, lng: 78.9629 },
                                            zoom: 5,
                                            mapTypeControl: false,
                                            streetViewControl: false,
                                            fullscreenControl: false,
                                            zoomControl: true,
                                        });
                                        // Auto-locate on load
                                        if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(function(position) {
                                                const pos = {
                                                    lat: position.coords.latitude,
                                                    lng: position.coords.longitude
                                                };
                                                map.setCenter(pos);
                                                map.setZoom(17);
                                                placeMarker(pos, true);
                                            });
                                        }
                                        // Add custom 'Locate Me' control (still in map for mobile, but also visible button above)
                                        if (map && map.controls) {
                                            const controlDiv = document.createElement('div');
                                            controlDiv.style.margin = '10px';
                                            controlDiv.style.background = 'none';
                                            controlDiv.index = 1;
                                            const controlUI = document.createElement('button');
                                            controlUI.className = 'btn btn-primary btn-sm';
                                            controlUI.style.borderRadius = '50%';
                                            controlUI.style.width = '40px';
                                            controlUI.style.height = '40px';
                                            controlUI.style.display = 'flex';
                                            controlUI.style.alignItems = 'center';
                                            controlUI.style.justifyContent = 'center';
                                            controlUI.title = 'Click to locate me';
                                            controlUI.innerHTML = '<i class="fas fa-crosshairs"></i>';
                                            controlDiv.appendChild(controlUI);
                                            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
                                            controlUI.addEventListener('click', locateMe);
                                        }
                                        // Add event for visible Locate Me button
                                        document.getElementById('locateMeBtn').addEventListener('click', locateMe);
                                        map.addListener('click', function(e) {
                                            placeMarker(e.latLng, true);
                                        });
                                    }
                                    function locateMe() {
                                        if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(function(position) {
                                                const pos = {
                                                    lat: position.coords.latitude,
                                                    lng: position.coords.longitude
                                                };
                                                map.setCenter(pos);
                                                map.setZoom(17);
                                                placeMarker(pos, true);
                                            }, function() {
                                                alert('Unable to retrieve your location.');
                                            });
                                        } else {
                                            alert('Geolocation is not supported by this browser.');
                                        }
                                    }
                                    function placeMarker(location, doReverseGeocode) {
                                        if (marker) {
                                            if (marker.setMap) marker.setMap(null);
                                            else if (marker.map) marker.map = null;
                                        }
                                        if (google.maps.marker && google.maps.marker.AdvancedMarkerElement) {
                                            marker = new google.maps.marker.AdvancedMarkerElement({
                                                map: map,
                                                position: location
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: location,
                                                map: map
                                            });
                                        }
                                        const lat = (typeof location.lat === 'function') ? location.lat() : location.lat;
                                        const lng = (typeof location.lng === 'function') ? location.lng() : location.lng;
                                        document.getElementById('latitude').value = lat;
                                        document.getElementById('longitude').value = lng;
                                        if (doReverseGeocode) {
                                            const geocoder = new google.maps.Geocoder();
                                            geocoder.geocode({ location: { lat: lat, lng: lng } }, function(results, status) {
                                                if (status === 'OK' && results[0]) {
                                                    fillAddressFields(results[0]);
                                                }
                                            });
                                        }
                                    }
                                    function fillAddressFields(result) {
                                        let door = '', street = '', area = '', city = '', state = '', pin = '';
                                        for (const comp of result.address_components) {
                                            if (comp.types.includes('street_number')) door = comp.long_name;
                                            if (comp.types.includes('route')) street = comp.long_name;
                                            if (comp.types.includes('sublocality') || comp.types.includes('sublocality_level_1')) area = comp.long_name;
                                            if (comp.types.includes('locality')) city = comp.long_name;
                                            if (comp.types.includes('administrative_area_level_1')) state = comp.long_name;
                                            if (comp.types.includes('postal_code')) pin = comp.long_name;
                                        }
                                        document.getElementById('door_number').value = door;
                                        document.getElementById('street').value = street;
                                        document.getElementById('area').value = area;
                                        document.getElementById('city').value = city;
                                        document.getElementById('state').value = state;
                                        document.getElementById('pin_code').value = pin;
                                    }
                                    window.initMap = initMap;
                                    </script>
                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places"></script>
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
                            <script>
                            document.getElementById('checkoutForm').addEventListener('submit', function(e) {
                                const deliveryType = document.querySelector('input[name="delivery_type"]:checked')?.value;
                                if (deliveryType === 'home_delivery') {
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
                                }
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
            const addressMapSection = document.getElementById('address_map_section');
            const deliveryType = document.querySelector('input[name="delivery_type"]:checked')?.value;
            if (deliveryType === 'home_delivery') {
                addressSection.style.display = 'block';
                if (addressMapSection) addressMapSection.style.display = 'block';
                document.getElementById('delivery_address').required = true;
            } else {
                addressSection.style.display = 'none';
                if (addressMapSection) addressMapSection.style.display = 'none';
                document.getElementById('delivery_address').required = false;
            }
        }
        // Ensure Home Delivery is selected and address section is visible on page load
        window.addEventListener('DOMContentLoaded', function() {
            document.getElementById('home_delivery').checked = true;
            toggleAddress();
        });

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
