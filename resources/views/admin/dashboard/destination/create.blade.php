@extends('layouts.app')

@section('title', 'Create Destination')
    
@section('header')
    <h2 class="text-4xl font-medium text-secondary">
        Create Destination
    </h2>
@endsection


    
@section('content')
    
<div class="mb-10">
    <form class="w-full bg-white p-8 shadow-xl rounded-lg" enctype="multipart/form-data" method="POST" action="/admin/dashboard/destination/store">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="name" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Destination Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight  focus:bg-white" type="file">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="category" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Category</label>
                <select id="category" name="category" class="block appearance-none w-full bg-second_white border-none @error('category') border-red-500 @enderror text-tertiary py-3 px-4 pr-8 rounded leading-tight focus:bg-white">
                    <option value="" selected disabled>Select a category</option>
                    <option value="beach" {{ old('category') == 'beach' ? 'selected' : '' }}>Beach</option>
                    <option value="mountain" {{ old('category') == 'mountain' ? 'selected' : '' }}>Mountain</option>
                    <option value="city" {{ old('category') == 'city' ? 'selected' : '' }}>City</option>
                    <option value="museum" {{ old('category') == 'museum' ? 'selected' : '' }}>Museum</option>
                    <option value="lake" {{ old('category') == 'lake' ? 'selected' : '' }}>Lake</option>
                    <option value="river" {{ old('category') == 'river' ? 'selected' : '' }}>River</option>
                    <option value="forest" {{ old('category') == 'forest' ? 'selected' : '' }}>Forest</option>
                    <option value="desert" {{ old('category') == 'desert' ? 'selected' : '' }}>Desert</option>
                    <option value="temple" {{ old('category') == 'temple' ? 'selected' : '' }}>Temple</option>
                    <option value="palace" {{ old('category') == 'palace' ? 'selected' : '' }}>Palace</option>
                    <option value="castle" {{ old('category') == 'castle' ? 'selected' : '' }}>Castle</option>
                    <option value="aquarium" {{ old('category') == 'aquarium' ? 'selected' : '' }}>Aquarium</option>
                    <option value="theme park" {{ old('category') == 'theme park' ? 'selected' : '' }}>Theme Park</option>
                    <option value="national park" {{ old('category') == 'national park' ? 'selected' : '' }}>National Park</option>
                    <option value="waterfall" {{ old('category') == 'waterfall' ? 'selected' : '' }}>Waterfall</option>
                    <option value="cave" {{ old('category') == 'cave' ? 'selected' : '' }}>Cave</option>
                    <option value="island" {{ old('category') == 'island' ? 'selected' : '' }}>Island</option>
                    <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>

                </select>
                @error('category')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="address" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Address</label>
                <input id="address" name="address" type="text" value="{{ old('address') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('address') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white">
                @error('address')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="address_url" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Address URL</label>
                <input id="address_url" name="address_url" type="text" value="{{ old('address_url') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('address_url') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white">
                @error('address_url')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Interactive Map Picker -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">
                    Location Picker <span class="text-gray-500 normal-case">(Click on map to select location)</span>
                </label>
                <div id="mapPicker" class="w-full h-96 rounded-lg border-2 border-second_white"></div>
                <p class="text-tertiary text-xs italic mt-2">Click anywhere on the map to set destination location. You can also drag the marker to adjust.</p>
            </div>
        </div>

        <!-- Hidden inputs for coordinates -->
        <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}">
        <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') }}">
        
        <!-- Display selected coordinates -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                <div class="bg-second_white rounded py-3 px-4">
                    <span class="text-tertiary text-xs font-bold">LATITUDE:</span>
                    <span id="latDisplay" class="text-tertiary text-sm ml-2">Not selected</span>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <div class="bg-second_white rounded py-3 px-4">
                    <span class="text-tertiary text-xs font-bold">LONGITUDE:</span>
                    <span id="lngDisplay" class="text-tertiary text-sm ml-2">Not selected</span>
                </div>
            </div>
        </div>
        
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="price" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Ticket Price</label>
                <input id="price" name="price" type="number" value="{{ old('price') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('price') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white">
                @error('price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="capacity_perday" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Capacity</label>
                <input id="capacity_perday" name="capacity_perday" type="number" value="{{ old('capacity_perday') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('capacity_perday') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white">
                @error('capacity_perday')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="description" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Description</label>
                <input id="description" name="description" type="text" value="{{ old('description') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('description') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white">
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2" for="main_image">
                    Thumbnail
                </label>
                <input class="appearance-none block w-full bg-second_white text-tertiary border-none @error('tumbnail') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white" id="main_image" name="tumbnail" type="file">
                @error('tumbnail')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="md:flex -mx-3 mb-2">
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2" for="image_1">
                    Image 1
                </label>
                <input class="appearance-none block w-full bg-second_white text-tertiary border-none @error('image_1') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white" id="image_1" name="image_1" type="file">
                @error('image_1')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2" for="image_2">
                    Image 2
                </label>
                <input class="appearance-none block w-full bg-second_white text-tertiary border-none @error('image_2') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white" id="image_2" name="image_2" type="file">
                @error('image_2')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2" for="image_3">
                    Image 3
                </label>
                <input class="appearance-none block w-full bg-second_white text-tertiary border-none @error('image_3') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white" id="image_3" name="image_3" type="file">
                <p class="text-tertiary text-xs italic">*optional</p>
                @error('image_3')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2" for="image_4">
                    Image 4
                </label>
                <input class="appearance-none block w-full bg-second_white text-tertiary border-none @error('image_4') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white" id="image_4" name="image_4" type="file">
                <p class="text-tertiary text-xs italic">*optional</p>
                @error('image_4')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

        </div>
        
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="content" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Content</label>
                <textarea id="content" name="content"
                        class="appearance-none block w-full bg-second_white text-tertiary border-none @error('content') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-2 flex justify-end">
            <button type="submit" class="bg-secondary text-white px-6 py-2 shadow-lg rounded-md">Submit</button>
        </div>
    </form>
</div>

@endsection
    
@section('script')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

<script>
    // Initialize TinyMCE
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });

    // Initialize Map Picker
    let map, marker;
    
    // Initialize map centered on West Java (Bandung)
    map = L.map('mapPicker').setView([-6.9175, 107.6191], 10);
    
    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 18,
    }).addTo(map);
    
    // West Java boundaries
    const WEST_JAVA_BOUNDS = {
        minLat: -7.8,
        maxLat: -5.5,
        minLng: 106.0,
        maxLng: 108.9
    };
    
    // Function to check if coordinates are within West Java
    function isWithinWestJava(lat, lng) {
        return lat >= WEST_JAVA_BOUNDS.minLat && lat <= WEST_JAVA_BOUNDS.maxLat &&
               lng >= WEST_JAVA_BOUNDS.minLng && lng <= WEST_JAVA_BOUNDS.maxLng;
    }
    
    // Function to update coordinates and address
    function updateLocation(lat, lng) {
        // Check if within West Java boundaries
        if (!isWithinWestJava(lat, lng)) {
            alert('⚠️ Location is outside West Java boundaries!\nPlease select a location within West Java region.');
            // Display coordinates in red
            document.getElementById('latDisplay').innerHTML = `<span class="text-red-500">${lat.toFixed(6)} (Outside bounds)</span>`;
            document.getElementById('lngDisplay').innerHTML = `<span class="text-red-500">${lng.toFixed(6)} (Outside bounds)</span>`;
            return false; // Prevent saving
        }
        
        // Update hidden inputs
        document.getElementById('latitude').value = lat.toFixed(6);
        document.getElementById('longitude').value = lng.toFixed(6);
        
        // Update display
        document.getElementById('latDisplay').textContent = lat.toFixed(6);
        document.getElementById('lngDisplay').textContent = lng.toFixed(6);
        
        // Reverse geocoding to get address
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    // Auto-fill address field
                    const addressField = document.getElementById('address');
                    if (addressField && !addressField.value) {
                        addressField.value = data.display_name;
                    }
                    
                    // Auto-fill address_url with Google Maps link
                    const addressUrlField = document.getElementById('address_url');
                    if (addressUrlField && !addressUrlField.value) {
                        addressUrlField.value = `https://maps.google.com/?q=${lat},${lng}`;
                    }
                }
            })
            .catch(error => console.log('Reverse geocoding failed:', error));
        
        return true;
    }
    
    // Map click event
    map.on('click', function(e) {
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;
        
        // Remove old marker if exists
        if (marker) {
            map.removeLayer(marker);
        }
        
        // Add new draggable marker
        marker = L.marker([lat, lng], { draggable: true }).addTo(map);
        
        // Update location
        updateLocation(lat, lng);
        
        // Handle marker drag
        marker.on('dragend', function(e) {
            const newLat = e.target.getLatLng().lat;
            const newLng = e.target.getLatLng().lng;
            updateLocation(newLat, newLng);
        });
    });
    
    // Load existing coordinates if any (for edit mode)
    const existingLat = parseFloat(document.getElementById('latitude').value);
    const existingLng = parseFloat(document.getElementById('longitude').value);
    
    if (existingLat && existingLng) {
        marker = L.marker([existingLat, existingLng], { draggable: true }).addTo(map);
        map.setView([existingLat, existingLng], 13);
        document.getElementById('latDisplay').textContent = existingLat.toFixed(6);
        document.getElementById('lngDisplay').textContent = existingLng.toFixed(6);
        
        marker.on('dragend', function(e) {
            const newLat = e.target.getLatLng().lat;
            const newLng = e.target.getLatLng().lng;
            updateLocation(newLat, newLng);
        });
    }
</script>
@endsection


    


