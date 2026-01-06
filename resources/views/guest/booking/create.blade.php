@extends('layouts.user')

@section('title', 'Book ' . $destination->name)

@section('content')

<div class="mt-24 mb-10">
    <div class="container px-4 md:px-0">
        <!-- Breadcrumb -->
        <nav class="mb-6">
            <ol class="flex items-center space-x-2 text-sm text-gray-600">
                <li><a href="/" class="hover:text-secondary">Home</a></li>
                <li><i class="fa-solid fa-chevron-right text-xs"></i></li>
                <li><a href="/destination" class="hover:text-secondary">Destinations</a></li>
                <li><i class="fa-solid fa-chevron-right text-xs"></i></li>
                <li><a href="/destination/{{ $destination->id }}" class="hover:text-secondary">{{ $destination->name }}</a></li>
                <li><i class="fa-solid fa-chevron-right text-xs"></i></li>
                <li class="text-secondary font-semibold">Book Now</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl md:text-5xl font-light text-gray-900 mb-2">
                Book Your Trip
            </h1>
            <p class="text-base md:text-lg text-gray-600">
                Plan your journey to <span class="font-semibold text-secondary">{{ $destination->name }}</span>
            </p>
        </div>

        <!-- Main Content: Map + Form -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <!-- LEFT COLUMN: Map -->
            <div class="order-2 lg:order-1">
                <div class="bg-white rounded-2xl shadow-xl p-6 lg:sticky lg:top-24">
                    <h2 class="text-xl font-semibold text-tertiary mb-4">
                        <i class="fa-solid fa-map-location-dot mr-2"></i>Select Pickup Location
                    </h2>
                    
                    <p class="text-sm text-gray-600 mb-4">
                        <i class="fa-solid fa-info-circle mr-1 text-blue-500"></i>
                        Click on the map to select your pickup location, or use the button below to detect your current location.
                    </p>
                    
                    <!-- Map Container -->
                    <div id="bookingMap" class="w-full h-64 md:h-96 lg:h-[450px] rounded-xl mb-4 border-2 border-gray-200"></div>
                    
                    <!-- Location Info -->
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3 p-3 bg-green-50 rounded-lg border border-green-200">
                            <i class="fa-solid fa-location-dot text-green-600 mt-1"></i>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-700">Pickup Location</p>
                                <p id="userLocationText" class="text-sm text-gray-600">Click on map to select location...</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 p-3 bg-red-50 rounded-lg border border-red-200">
                            <i class="fa-solid fa-map-marker-alt text-red-600 mt-1"></i>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-700">Destination</p>
                                <p class="text-sm text-gray-600">{{ $destination->address }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg border border-blue-200">
                            <i class="fa-solid fa-route text-blue-600 mt-1"></i>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-700">Distance</p>
                                <p id="routeDistance" class="text-sm font-bold text-blue-600">Select pickup location first</p>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" id="detectLocationBtn" class="w-full mt-4 bg-secondary hover:bg-tertiary text-white text-base md:text-lg font-semibold py-3 md:py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                        <i class="fa-solid fa-location-crosshairs mr-2"></i>Use My Current Location
                    </button>
                </div>
            </div>

            <!-- RIGHT COLUMN: Booking Form -->
            <div class="order-1 lg:order-2">
                <div class="bg-white rounded-2xl shadow-xl p-6">
                    
                    @if (!Auth::check() || Auth::user()->role === 'admin')
                        <div class="text-center py-10">
                            <i class="fa-solid fa-user-lock text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-tertiary mb-2">Login Required</h3>
                            <p class="text-gray-600 mb-4">You need to login first before booking</p>
                            <a href="/login" class="inline-block bg-secondary hover:bg-tertiary text-white py-2 px-6 rounded-full transition-colors">
                                Login Now
                            </a>
                        </div>
                    @elseif (!Auth::user()->phone)
                        <div class="text-center py-10">
                            <i class="fa-solid fa-user-edit text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-tertiary mb-2">Complete Your Profile</h3>
                            <p class="text-gray-600 mb-4">Please complete your personal data before booking</p>
                            <a href="/user/dashboard" class="inline-block bg-secondary hover:bg-tertiary text-white py-2 px-6 rounded-full transition-colors">
                                Update Profile
                            </a>
                        </div>
                    @elseif ($available_capacity_today == 0)
                        <div class="text-center py-10">
                            <i class="fa-solid fa-calendar-xmark text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-tertiary mb-2">Fully Booked</h3>
                            <p class="text-gray-600">Sorry, no available reservations for today. Please try another date.</p>
                        </div>
                    @else
                        <h2 class="text-xl font-semibold text-tertiary mb-6">
                            <i class="fa-solid fa-calendar-check mr-2"></i>Booking Details
                        </h2>

                        <form action="/user/reservation/{{ $destination->id }}" method="POST">
                            @csrf
                            @method('POST')
                            
                            <!-- Hidden fields for coordinates -->
                            <input type="hidden" id="pickup_latitude" name="pickup_latitude" value="{{ old('pickup_latitude') }}">
                            <input type="hidden" id="pickup_longitude" name="pickup_longitude" value="{{ old('pickup_longitude') }}">
                            
                            <!-- Date -->
                            <div class="mb-4">
                                <label for="date" class="block text-sm font-semibold text-tertiary mb-2">
                                    <i class="fa-solid fa-calendar mr-1"></i>Travel Date
                                </label>
                                <input id="date" name="date" type="date" 
                                       min="{{ date('Y-m-d') }}"
                                       class="w-full px-4 py-3 border-2 border-second_white rounded-lg focus:outline-none focus:border-secondary text-tertiary @error('date') border-red-500 @enderror">
                                @error('date')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Person & Duration -->
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="person" class="block text-sm font-semibold text-tertiary mb-2">
                                        <i class="fa-solid fa-users mr-1"></i>Persons
                                    </label>
                                    <input id="person" name="person" type="number" min="1" value="1"
                                           class="w-full px-4 py-3 border-2 border-second_white rounded-lg focus:outline-none focus:border-secondary text-tertiary @error('person') border-red-500 @enderror">
                                    @error('person')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="duration" class="block text-sm font-semibold text-tertiary mb-2">
                                        <i class="fa-solid fa-clock mr-1"></i>Duration (days)
                                    </label>
                                    <input id="duration" name="duration" type="number" min="1" value="1"
                                           class="w-full px-4 py-3 border-2 border-second_white rounded-lg focus:outline-none focus:border-secondary text-tertiary @error('duration') border-red-500 @enderror">
                                    @error('duration')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Travel & Distance -->
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="travel" class="block text-sm font-semibold text-tertiary mb-2">
                                        <i class="fa-solid fa-car mr-1"></i>Travel Option
                                    </label>
                                    <select id="travel" name="travel_id"
                                            class="w-full px-4 py-3 border-2 border-second_white rounded-lg focus:outline-none focus:border-secondary text-tertiary @error('travel') border-red-500 @enderror">
                                        <option value="">None</option>
                                        @foreach($travels as $item)
                                            <option value="{{ $item->id }}" data-price="{{ $item->price }}" data-price-km="{{ $item->price_per_km }}">
                                                {{ $item->name }} - Rp {{ number_format($item->price) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('travel')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="distance_in_km" class="block text-sm font-semibold text-tertiary mb-2">
                                        <i class="fa-solid fa-road mr-1"></i>Distance (km)
                                    </label>
                                    <input id="distance_in_km" name="distance_in_km" type="number" step="0.01" readonly
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 text-tertiary cursor-not-allowed">
                                    <p class="text-xs text-gray-500 mt-1">Auto-calculated from route</p>
                                </div>
                            </div>

                            <!-- Pickup Location -->
                            <div class="mb-6">
                                <label for="pickup_location" class="block text-sm font-semibold text-tertiary mb-2">
                                    <i class="fa-solid fa-map-pin mr-1"></i>Pickup Location Address
                                </label>
                                <textarea id="pickup_location" name="pickup_location" rows="3" readonly
                                          placeholder="Select location on map..."
                                          class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 text-tertiary cursor-not-allowed @error('pickup_location') border-red-500 @enderror">{{ old('pickup_location') }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Auto-filled from selected location on map</p>
                                @error('pickup_location')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Price Summary -->
                            <div class="bg-second_white rounded-xl p-4 mb-6">
                                <h3 class="text-sm font-semibold text-tertiary mb-3">Price Summary</h3>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Ticket (per person)</span>
                                        <span class="font-semibold">Rp {{ number_format($destination->price) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Number of persons</span>
                                        <span id="personCount" class="font-semibold">1</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Travel fee</span>
                                        <span id="travelFee" class="font-semibold">Rp 0</span>
                                    </div>
                                    <div class="border-t border-gray-300 my-2"></div>
                                    <div class="flex justify-between text-lg">
                                        <span class="font-bold text-tertiary">Total</span>
                                        <span id="totalPrice" class="font-bold text-secondary">Rp {{ number_format($destination->price) }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" id="submitBtn" class="w-full bg-secondary hover:bg-tertiary text-white text-base md:text-lg font-semibold py-3 md:py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl disabled:bg-gray-400 disabled:cursor-not-allowed">
                                <i class="fa-solid fa-check-circle mr-2"></i>Confirm Booking
                            </button>
                        </form>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('script')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- Leaflet Routing Machine -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

<script>
    // Destination coordinates
    const destLat = {{ $destination->latitude ?? -6.9175 }};
    const destLng = {{ $destination->longitude ?? 107.6191 }};
    const ticketPrice = {{ $destination->price }};
    
    // Initialize map centered between West Java
    const map = L.map('bookingMap').setView([-6.9, 107.6], 10);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 18,
    }).addTo(map);
    
    // Destination marker (red)
    const destMarker = L.marker([destLat, destLng], {
        icon: L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        })
    }).addTo(map);
    
    destMarker.bindPopup('<b>{{ $destination->name }}</b><br>{{ $destination->address }}');
    
    // Variables
    let routingControl = null;
    let pickupMarker = null;
    let pickupLat = null;
    let pickupLng = null;
    
    // Create pickup marker icon (green)
    const pickupIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    
    // Function to set pickup location
    function setPickupLocation(lat, lng) {
        pickupLat = lat;
        pickupLng = lng;
        
        // Update hidden fields
        document.getElementById('pickup_latitude').value = lat;
        document.getElementById('pickup_longitude').value = lng;
        
        // Remove existing pickup marker
        if (pickupMarker) {
            map.removeLayer(pickupMarker);
        }
        
        // Add new pickup marker
        pickupMarker = L.marker([lat, lng], { icon: pickupIcon }).addTo(map);
        pickupMarker.bindPopup('<b>Pickup Location</b>').openPopup();
        
        // Reverse geocode to get address
        document.getElementById('userLocationText').textContent = 'Getting address...';
        document.getElementById('pickup_location').value = 'Getting address...';
        
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`)
            .then(response => response.json())
            .then(data => {
                const address = data.display_name || `${lat.toFixed(6)}, ${lng.toFixed(6)}`;
                document.getElementById('userLocationText').textContent = address;
                document.getElementById('pickup_location').value = address;
            })
            .catch(error => {
                console.error('Reverse geocoding failed:', error);
                const fallbackAddress = `${lat.toFixed(6)}, ${lng.toFixed(6)}`;
                document.getElementById('userLocationText').textContent = fallbackAddress;
                document.getElementById('pickup_location').value = fallbackAddress;
            });
        
        // Draw route
        drawRoute(lat, lng);
    }
    
    // Handle map click to select pickup location
    map.on('click', function(e) {
        setPickupLocation(e.latlng.lat, e.latlng.lng);
    });
    
    // Detect current location button
    function detectLocation() {
        if (!navigator.geolocation) {
            alert('Geolocation is not supported by your browser');
            return;
        }
        
        document.getElementById('userLocationText').textContent = 'Detecting location...';
        document.getElementById('detectLocationBtn').disabled = true;
        document.getElementById('detectLocationBtn').innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-2"></i>Detecting...';
        
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                
                document.getElementById('detectLocationBtn').disabled = false;
                document.getElementById('detectLocationBtn').innerHTML = '<i class="fa-solid fa-location-crosshairs mr-2"></i>Use My Current Location';
                
                // Center map on detected location
                map.setView([lat, lng], 13);
                
                // Set pickup location
                setPickupLocation(lat, lng);
            },
            (error) => {
                document.getElementById('userLocationText').textContent = 'Location access denied. Click on map to select.';
                document.getElementById('detectLocationBtn').disabled = false;
                document.getElementById('detectLocationBtn').innerHTML = '<i class="fa-solid fa-location-crosshairs mr-2"></i>Use My Current Location';
                alert('Unable to get your location. Please click on the map to select your pickup location.');
            }
        );
    }
    
    // Draw route between pickup and destination
    function drawRoute(fromLat, fromLng) {
        if (routingControl) {
            map.removeControl(routingControl);
        }
        
        routingControl = L.Routing.control({
            waypoints: [
                L.latLng(fromLat, fromLng),
                L.latLng(destLat, destLng)
            ],
            routeWhileDragging: false,
            showAlternatives: false,
            addWaypoints: false,
            show: false,
            lineOptions: {
                styles: [{color: '#2563eb', opacity: 0.8, weight: 5}]
            },
            createMarker: function() {
                return null; // Don't create markers (we handle them ourselves)
            }
        }).addTo(map);
        
        routingControl.on('routesfound', function(e) {
            const route = e.routes[0];
            const distanceKm = (route.summary.totalDistance / 1000).toFixed(2);
            const durationMin = Math.round(route.summary.totalTime / 60);
            
            document.getElementById('routeDistance').textContent = `${distanceKm} km (≈ ${durationMin} min)`;
            document.getElementById('distance_in_km').value = distanceKm;
            
            // Fit map to show entire route
            const bounds = L.latLngBounds([
                [fromLat, fromLng],
                [destLat, destLng]
            ]);
            map.fitBounds(bounds.pad(0.2));
            
            calculateTotal();
        });
        
        routingControl.on('routingerror', function(e) {
            console.error('Routing error:', e);
            document.getElementById('routeDistance').textContent = 'Route calculation failed';
        });
    }
    
    // Price calculator
    function calculateTotal() {
        const persons = parseInt(document.getElementById('person').value) || 1;
        const distance = parseFloat(document.getElementById('distance_in_km').value) || 0;
        const travelSelect = document.getElementById('travel');
        const selectedTravel = travelSelect.options[travelSelect.selectedIndex];
        
        let travelFee = 0;
        if (selectedTravel.value) {
            const basePrice = parseFloat(selectedTravel.dataset.price) || 0;
            const pricePerKm = parseFloat(selectedTravel.dataset.priceKm) || 0;
            travelFee = basePrice + (pricePerKm * distance);
        }
        
        const ticketTotal = ticketPrice * persons;
        const total = ticketTotal + travelFee;
        
        document.getElementById('personCount').textContent = persons;
        document.getElementById('travelFee').textContent = 'Rp ' + travelFee.toLocaleString('id-ID');
        document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
    }
    
    // Event listeners
    document.getElementById('detectLocationBtn').addEventListener('click', detectLocation);
    document.getElementById('person').addEventListener('input', calculateTotal);
    document.getElementById('travel').addEventListener('change', calculateTotal);
</script>

<style>
    /* Hide routing control panel */
    .leaflet-routing-container {
        display: none !important;
    }
</style>
@endsection
