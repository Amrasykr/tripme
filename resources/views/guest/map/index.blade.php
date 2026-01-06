@extends('layouts.user')

@section('title', 'West Java Tourism Map')

@section('content')

<div class="relative mt-24">
    <div class="container px-4 md:px-0">

        <!-- Search and Filter Controls -->
        <div class="bg-white shadow-lg rounded-2xl p-4 md:p-6 mb-4">
            <!-- Search Bar -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-tertiary mb-2">
                    <i class="fa-solid fa-search mr-2"></i>Search Destinations
                </label>
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Search by name..." 
                    class="w-full px-4 py-2 border-2 border-second_white rounded-lg focus:outline-none focus:border-secondary text-tertiary"
                />
                <!-- Search Results List -->
                <div id="searchResults" class="mt-2 max-h-48 md:max-h-64 overflow-y-auto hidden bg-white border border-gray-200 rounded-lg">
                    <!-- Populated by JavaScript -->
                </div>
            </div>

            <!-- Category Filter -->
            <div>
                <label class="block text-sm font-semibold text-tertiary mb-2">
                    <i class="fa-solid fa-filter mr-2"></i>Filter by Category
                </label>
                <div class="flex flex-wrap gap-2" id="categoryFilters">
                    <!-- Populated by JavaScript -->
                </div>
            </div>
        </div>

        <!-- Map Container -->
        <div class="relative bg-white shadow-2xl rounded-2xl p-4 md:p-6 mb-10">
            <div id="map" class="w-full h-[500px] md:h-[600px] rounded-xl z-0"></div>
            
            <!-- Legend -->
            <div class="mt-4 p-4 bg-second_white rounded-lg">
                <h3 class="text-sm font-semibold text-tertiary mb-2">
                    <i class="fa-solid fa-map-marker-alt mr-2"></i>Map Legend
                </h3>
                <p class="text-xs text-gray-500">
                    Showing: <strong id="filterCount">{{ count($destinations) }}</strong> of <strong>{{ count($destinations) }}</strong> destinations
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    <i class="fa-solid fa-info-circle mr-1"></i>
                    Click on markers to view details or get directions
                </p>
            </div>
        </div>
    </div>
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

<!-- Leaflet Routing Machine CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />

<!-- Leaflet Routing Machine JS -->
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

<script>
    // Initialize the map centered on West Java (Bandung area)
    const map = L.map('map').setView([-6.9, 107.6], 9);

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(map);

    // Destinations data from controller
    const destinations = @json($destinations);

    // Category color mapping for markers
    const categoryColors = {
        'beach': '#3B82F6',      // blue
        'mountain': '#10B981',   // green
        'lake': '#06B6D4',       // cyan
        'waterfall': '#8B5CF6',  // purple
        'zoo': '#F59E0B',        // orange
        'river': '#14B8A6',      // teal
        'museum': '#EC4899',     // pink
        'city': '#6366F1',       // indigo
        'forest': '#059669',     // emerald
        'temple': '#DC2626',     // red
        'palace': '#7C3AED',     // violet
        'castle': '#9333EA',     // purple
        'aquarium': '#0EA5E9',   // sky
        'theme park': '#F59E0B', // amber
        'national park': '#84CC16', // lime
        'cave': '#78716C',       // stone
        'island': '#0891B2',     // cyan
        'desert': '#EAB308',     // yellow
        'other': '#6B7280'       // gray
    };

    // Create custom icon function
    function getMarkerIcon(category) {
        const color = categoryColors[category] || categoryColors['other'];
        return L.divIcon({
            className: 'custom-marker',
            html: `<div style="background-color: ${color}; width: 30px; height: 30px; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); border: 3px solid white; box-shadow: 0 3px 6px rgba(0,0,0,0.3);"><div style="width: 10px; height: 10px; background-color: white; border-radius: 50%; position: absolute; top: 7px; left: 7px;"></div></div>`,
            iconSize: [30, 42],
            iconAnchor: [15, 42],
            popupAnchor: [0, -42]
        });
    }

    // Store all markers for filtering
    let allMarkers = [];
    let markerLayer = L.layerGroup().addTo(map);

    // Get unique categories from destinations
    const categories = [...new Set(destinations.map(d => d.category))];
    let selectedCategories = new Set(categories); // All selected by default

    // Create category filter checkboxes
    const categoryFiltersDiv = document.getElementById('categoryFilters');
    categories.forEach(category => {
        const checkbox = document.createElement('label');
        checkbox.className = 'inline-flex items-center cursor-pointer';
        checkbox.innerHTML = `
            <input type="checkbox" class="category-filter mr-1" value="${category}" checked>
            <span class="px-3 py-1 bg-${getCategoryColor(category)}-100 text-${getCategoryColor(category)}-800 text-xs rounded-full">
                ${category}
            </span>
        `;
        categoryFiltersDiv.appendChild(checkbox);
    });

    // Helper function to get category color class
    function getCategoryColor(category) {
        const colorMap = {
            'beach': 'blue', 'mountain': 'green', 'lake': 'cyan',
            'waterfall': 'purple', 'zoo': 'orange', 'river': 'teal',
            'museum': 'pink', 'city': 'indigo', 'forest': 'emerald'
        };
        return colorMap[category] || 'gray';
    }

    // Add markers for each destination
    destinations.forEach(destination => {
        const marker = L.marker(
            [parseFloat(destination.latitude), parseFloat(destination.longitude)],
            { icon: getMarkerIcon(destination.category) }
        );

        // Store destination data with marker
        marker.destinationData = destination;

        // Create popup content with directions button
        const popupContent = `
            <div class="p-2 min-w-[200px]">
                <img src="${destination.main_image}" alt="${destination.name}" 
                     class="w-full h-32 object-cover rounded-lg mb-2" 
                     onerror="this.src='{{ asset('assets/tumbnail_image/default-thumbnail.png') }}'">
                <h3 class="font-bold text-lg text-tertiary mb-1">${destination.name}</h3>
                <p class="text-xs text-gray-600 mb-2">${destination.description}</p>
                <a href="https://www.google.com/maps/search/?api=1&query=${destination.latitude},${destination.longitude}" 
                   target="_blank"
                   class="text-xs text-blue-600 hover:text-blue-800 mb-2 block">
                    <i class="fa-solid fa-map-marker-alt mr-1"></i>${destination.address || 'View on Google Maps'}
                </a>
                <div class="flex justify-between items-center mb-2">
                    <span class="px-2 py-1 bg-tertiary text-white text-xs rounded-full">${destination.category}</span>
                    <span class="text-sm font-semibold">Rp ${parseInt(destination.price).toLocaleString('id-ID')}</span>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <button 
                        onclick="window.location.href='${destination.url}'"
                        class="bg-secondary hover:bg-tertiary text-white py-2 px-3 rounded-full text-xs transition-colors">
                        <i class="fa-solid fa-info-circle mr-1"></i>Details
                    </button>
                    <button 
                        onclick="getDirections(${destination.latitude}, ${destination.longitude}, '${destination.name.replace(/'/g, "\\'")}')"
                        class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded-full text-xs transition-colors">
                        <i class="fa-solid fa-directions mr-1"></i>Directions
                    </button>
                </div>
            </div>
        `;

        marker.bindPopup(popupContent, {
            maxWidth: 250,
            className: 'custom-popup'
        });

        allMarkers.push(marker);
        markerLayer.addLayer(marker);
    });

    // Routing control variable
    let routingControl = null;

    // Function to get directions and display route on map
    function getDirections(destLat, destLng, destName) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;
                    
                    // Remove existing route if any
                    if (routingControl) {
                        map.removeControl(routingControl);
                    }
                    
                    // Create routing control
                    routingControl = L.Routing.control({
                        waypoints: [
                            L.latLng(userLat, userLng),
                            L.latLng(destLat, destLng)
                        ],
                        routeWhileDragging: false,
                        showAlternatives: false,
                        addWaypoints: false,
                        lineOptions: {
                            styles: [{color: '#2563eb', opacity: 0.8, weight: 5}]
                        },
                        createMarker: function(i, waypoint, n) {
                            const marker = L.marker(waypoint.latLng, {
                                draggable: false,
                                icon: i === 0 ? L.icon({
                                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
                                    iconSize: [25, 41],
                                    iconAnchor: [12, 41],
                                    popupAnchor: [1, -34],
                                    shadowSize: [41, 41]
                                }) : L.icon({
                                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
                                    iconSize: [25, 41],
                                    iconAnchor: [12, 41],
                                    popupAnchor: [1, -34],
                                    shadowSize: [41, 41]
                                })
                            });
                            
                            if (i === 0) {
                                marker.bindPopup('<b>Your Location</b>');
                            } else {
                                marker.bindPopup(`<b>${destName}</b>`);
                            }
                            
                            return marker;
                        }
                    }).addTo(map);
                    
                    // Fit bounds to show entire route
                    routingControl.on('routesfound', function(e) {
                        const routes = e.routes;
                        const summary = routes[0].summary;
                        // Show route info
                        console.log('Distance: ' + (summary.totalDistance / 1000).toFixed(2) + ' km');
                        console.log('Duration: ' + Math.round(summary.totalTime / 60) + ' minutes');
                    });
                },
                (error) => {
                    alert('Unable to get your location. Please enable location services.');
                }
            );
        } else {
            alert('Geolocation is not supported by your browser.');
        }
    }

    // Make function global
    window.getDirections = getDirections;

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', filterMarkers);

    // Category filter functionality
    document.querySelectorAll('.category-filter').forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            if (e.target.checked) {
                selectedCategories.add(e.target.value);
            } else {
                selectedCategories.delete(e.target.value);
            }
            filterMarkers();
        });
    });

    // Filter markers based on search and category
    function filterMarkers() {
        const searchTerm = searchInput.value.toLowerCase();
        markerLayer.clearLayers();

        const filtered = allMarkers.filter(marker => {
            const dest = marker.destinationData;
            const matchesSearch = dest.name.toLowerCase().includes(searchTerm);
            const matchesCategory = selectedCategories.has(dest.category);
            return matchesSearch && matchesCategory;
        });

        filtered.forEach(marker => markerLayer.addLayer(marker));

        // Update total count
        document.getElementById('filterCount').textContent = filtered.length;

        // Update search results list
        const searchResultsDiv = document.getElementById('searchResults');
        
        if (searchTerm.length > 0) {
            searchResultsDiv.classList.remove('hidden');
            
            if (filtered.length > 0) {
                searchResultsDiv.innerHTML = filtered.map((marker, index) => {
                    const dest = marker.destinationData;
                    return `
                        <div class="search-result-item p-3 border-b border-gray-200 hover:bg-second_white cursor-pointer transition-colors"
                             onclick="openMarkerPopup(${index})">
                            <div class="flex items-center gap-3">
                                <img src="${dest.main_image}" 
                                     alt="${dest.name}" 
                                     class="w-16 h-16 object-cover rounded-lg"
                                     onerror="this.src='{{ asset('assets/tumbnail_image/default-thumbnail.png') }}'">
                                <div class="flex-1">
                                    <h4 class="font-semibold text-tertiary text-sm">${dest.name}</h4>
                                    <p class="text-xs text-gray-600 line-clamp-1">${dest.description}</p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="px-2 py-0.5 bg-tertiary text-white text-xs rounded-full">${dest.category}</span>
                                        <span class="text-xs text-gray-500">Rp ${parseInt(dest.price).toLocaleString('id-ID')}</span>
                                    </div>
                                </div>
                                <i class="fa-solid fa-chevron-right text-gray-400"></i>
                            </div>
                        </div>
                    `;
                }).join('');
            } else {
                searchResultsDiv.innerHTML = `
                    <div class="p-4 text-center text-gray-500 text-sm">
                        <i class="fa-solid fa-search mb-2 text-2xl text-gray-300"></i>
                        <p>No destinations found matching "${searchTerm}"</p>
                    </div>
                `;
            }
        } else {
            searchResultsDiv.classList.add('hidden');
        }
    }

    // Function to open marker popup and pan to location
    function openMarkerPopup(index) {
        const marker = allMarkers.filter(m => {
            const dest = m.destinationData;
            const matchesSearch = dest.name.toLowerCase().includes(searchInput.value.toLowerCase());
            const matchesCategory = selectedCategories.has(dest.category);
            return matchesSearch && matchesCategory;
        })[index];
        
        if (marker) {
            map.setView(marker.getLatLng(), 14);
            marker.openPopup();
            // Hide search results after clicking
            document.getElementById('searchResults').classList.add('hidden');
            searchInput.value = '';
        }
    }

    // Make function global
    window.openMarkerPopup = openMarkerPopup;

    // Fit map bounds to show all markers if there are any
    if (destinations.length > 0) {
        const group = new L.featureGroup(
            destinations.map(d => L.marker([parseFloat(d.latitude), parseFloat(d.longitude)]))
        );
        map.fitBounds(group.getBounds().pad(0.1));
    }
</script>

<style>
    /* Custom popup styles */
    .leaflet-popup-content-wrapper {
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .leaflet-popup-content {
        margin: 0;
        min-width: 200px;
    }
    
    .custom-marker {
        background: transparent;
        border: none;
    }
    
    /* Ensure map controls are visible */
    .leaflet-control-zoom {
        border: none !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .leaflet-bar a {
        color: #374151 !important;
    }
</style>
@endsection
