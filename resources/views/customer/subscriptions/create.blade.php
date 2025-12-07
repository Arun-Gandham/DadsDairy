<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe - Dad's Dairy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .navbar { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .sidebar {
            background: white;
            min-height: calc(100vh - 60px);
            padding: 20px 0;
        }
        .sidebar a {
            color: #333;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            border-left: 4px solid transparent;
        }
        .sidebar a.active {
            background: #f0f0f0;
            border-left-color: #667eea;
            color: #667eea;
        }
        .main-content { padding: 30px; }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
        }
        .btn-gradient:hover {
            color: white;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
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

    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2">
            <div class="sidebar">
                <a href="{{ route('customer.products') }}">
                    <i class="fas fa-shopping-bag"></i> Shop
                </a>
                <a href="{{ route('customer.cart') }}">
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
                <a href="{{ route('customer.orders') }}">
                    <i class="fas fa-list"></i> Orders
                </a>
                <a href="{{ route('customer.subscriptions.index') }}" class="active">
                    <i class="fas fa-sync"></i> Subscriptions
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Subscribe to {{ $product->name }}</h1>
                    <a href="{{ route('customer.products.show', $product) }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ route('customer.subscriptions.store', $product) }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <!-- Delivery Location Card -->
                            <div class="card mb-4">
                                <div class="card-header bg-primary text-white">
                                    <strong>Delivery Location</strong>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="door_number" class="form-label">Door Number</label>
                                        <input type="text" class="form-control" id="door_number" name="door_number" maxlength="20" required placeholder="Enter door number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="street" class="form-label">Street</label>
                                        <input type="text" class="form-control" id="street" name="street" maxlength="50" required placeholder="Enter street">
                                    </div>
                                    <div class="mb-3">
                                        <label for="area" class="form-label">Area</label>
                                        <input type="text" class="form-control" id="area" name="area" maxlength="50" required placeholder="Enter area">
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" maxlength="50" required placeholder="Enter city">
                                    </div>
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" id="state" name="state" maxlength="50" required placeholder="Enter state">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pin_code" class="form-label">Pin Code</label>
                                        <input type="text" class="form-control" id="pin_code" name="pin_code" maxlength="10" required placeholder="Enter pin code">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pick Location on Map</label>
                                        <div id="map" style="height: 300px; width: 100%;"></div>
                                        <div class="input-group mt-2">
                                            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" required readonly>
                                            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" required readonly>
                                        </div>
                                        <input type="hidden" name="address" id="address" />
                                        <small class="text-muted">Click on the map or use the map's blue location button to select your delivery location.</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Subscription Details Card -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Subscription Details</h5>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if($plan)
                                        <input type="hidden" name="subscription_plan_id" value="{{ $plan->id }}">
                                    @endif

                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity per Delivery</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="{{ $product->quantity }}" value="1" required>
                                        <small class="text-muted">Available stock: {{ $product->quantity }} units</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="frequency" class="form-label">Delivery Frequency</label>
                                        <select class="form-select" id="frequency" name="frequency" required>
                                            <option value="">-- Select Frequency --</option>
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="start_date" class="form-label">Subscription Start Date</label>
                                        <input 
                                            type="date" 
                                            class="form-control" 
                                            id="start_date_display" 
                                            value="{{ now()->format('Y-m-d') }}" 
                                            disabled>
                                    </div>

                                    <div class="mb-4">
                                        <label for="next_delivery_date" class="form-label">First Delivery Date</label>
                                        <input type="date" class="form-control" id="next_delivery_date" name="next_delivery_date" min="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}" required>
                                    </div>

                                    @if($plan)
                                    <div class="mb-4">
                                        <label class="form-label">Selected Plan</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <strong>{{ $plan->name }}</strong><br>
                                                Duration: {{ $plan->duration_days }} days<br>
                                                Quantity: {{ $plan->ml }}<br>
                                                Price per unit: ₹{{ number_format($plan->price_per_unit, 2) }}
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <button type="submit" class="btn btn-gradient btn-lg w-100">
                                        <i class="fas fa-check"></i> Start Subscription
                                    </button>
                                </div>
                            </div>
                        </form>
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
                                }, function() {
                                    // If denied or failed, do nothing (map stays at default)
                                });
                            }
                            // Add custom 'Locate Me' control if map is initialized
                            if (map && map.controls) {
                                const controlDiv = document.createElement('div');
                                controlDiv.style.margin = '10px';
                                controlDiv.style.padding = '0';
                                controlDiv.style.background = 'none';
                                controlDiv.style.boxShadow = 'none';
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
                                controlUI.addEventListener('click', function() {
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
                                });
                            }
                            map.addListener('click', function(e) {
                                placeMarker(e.latLng, true);
                            });
                        }
                        function placeMarker(location, doReverseGeocode) {
                            if (marker) {
                                if (marker.setMap) marker.setMap(null);
                                else if (marker.map) marker.map = null;
                            }
                            // Use AdvancedMarkerElement if available, else fallback
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
                            // Support both LatLng and LatLngLiteral
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
                            // Compose a full address string for the hidden address field
                            let address = '';
                            if (door) address += door + ', ';
                            if (street) address += street + ', ';
                            if (area) address += area + ', ';
                            if (city) address += city + ', ';
                            if (state) address += state + ', ';
                            if (pin) address += pin;
                            address = address.replace(/, $/, '');
                            document.getElementById('address').value = address;
                        }
                        window.initMap = initMap;
                        </script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places"></script>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Product Details</h5>
                            </div>
                            <div class="card-body">
                                <p>
                                    <strong>Product:</strong> <br>
                                    {{ $product->name }}
                                </p>
                                <p>
                                    <strong>Category:</strong> <br>
                                    {{ $product->category->name }}
                                </p>
                                <p>
                                    <strong>Price per Unit:</strong> <br>
                                    ₹{{ number_format($product->price, 2) }}
                                </p>
                                <hr>
                                <p>
                                    <strong>Description:</strong> <br>
                                    <small>{{ $product->description }}</small>
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h5 class="mb-0">Subscription Info</h5>
                            </div>
                            <div class="card-body">
                                <p>
                                    <strong>How it works:</strong>
                                </p>
                                <ul>
                                    <li>Choose quantity and frequency</li>
                                    <li>Select first delivery date</li>
                                    <li>Auto-delivery on schedule</li>
                                    <li>Pause or cancel anytime</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
