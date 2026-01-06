@extends('layouts.app')

@section('title', 'Visitors Dashboard')

@section('header')
    <h2 class="text-4xl font-medium text-secondary">
        All Visitors
    </h2>
@endsection

@section('content')

    <div class="w-80 md:w-full block overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex flex-wrap sm:space-y-0 items-center justify-between p-4 bg-second_white">
            <form action="{{ route('admin.dashboard.visitor') }}" method="GET" class="flex items-center">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-tertiary" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="table-search" class="block p-2 pl-8 text-sm text-tertiary border border-gray-300 rounded-lg bg-white" placeholder="Search" value="{{ request('search') }}">
                </div>
            </form>
        </div>
        <table class="w-full text-sm text-left text-tertiary">
            <thead class="text-sm text-white uppercase bg-tertiary">
                <tr>
                    <th scope="col" class="px-6 py-3 w-1/3">Visitor</th>
                    <th scope="col" class="px-6 py-3 w-1/4">Destination</th>
                    <th scope="col" class="px-6 py-3 w-1/4">Date</th>
                    <th scope="col" class="px-6 py-3 w-1/4">Status</th>
                    <th scope="col" class="px-6 py-3 w-24">Action</th>
                </tr>
            </thead>
            <tbody>
                @empty($visitors->all())
                    <tr>
                        <td colspan="6" class="text-center py-5 text-lg">There is no visitor</td>
                    </tr>
                @endempty
                @foreach ($visitors as $visitor)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="p-2">
                                    @if ($visitor->user->image)
                                    <img src="{{ asset('assets/user_image/'. $visitor->user->image) }}" alt="user image" class="rounded-full w-12 h-12 object-cover">
                                    @else
                                    <img src="{{ asset('images/user-default.png') }}" alt="user image" class="rounded-full w-12">
                                    @endif                                
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">{{ $visitor->user->name}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 w-1/4">{{ $visitor->destination->name }}</td>
                    <td class="px-6 py-4 w-1/4">{{ \Carbon\Carbon::parse($visitor->date)->translatedFormat('l, j F Y') }}</td>
                    <td class="px-6 py-4 w-1/4">{{ $visitor->status }}</td>
                    <td class="px-4 py-6 flex space-x-2">
                        <!-- View Button - Always visible -->
                        <button type="button" 
                                onclick="openModal({{ $visitor->id }})"
                                class="font-medium text-white text-xs bg-blue-500 hover:bg-blue-600 rounded-full px-3 py-2">
                            View
                        </button>
                        
                        @if ($visitor->status === 'paid and pending')
                        <form action="/admin/dashboard/visitor/{{$visitor->id}}/confirm" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="font-medium text-tertiary text-xs bg-alternate rounded-full px-3 py-2">
                                Confirm
                            </button> 
                        </form>
                        <form action="/admin/dashboard/visitor/{{$visitor->id}}/reject" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="font-medium text-tertiary text-xs bg-red-300 rounded-full px-3 py-2">
                                Reject
                            </button> 
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="px-4 py-3 bg-white border-t border-gray-200 ">
            {{ $visitors->withQueryString()->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div id="detailModal" class="fixed inset-0 z-50 hidden">
        <div class="fixed inset-0 bg-black bg-opacity-50" onclick="closeModal()"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-xl shadow-xl w-full max-w-lg max-h-[85vh] overflow-y-auto relative">
                <div class="sticky top-0 bg-tertiary text-white p-4 rounded-t-xl flex justify-between items-center">
                    <h3 class="font-semibold">Reservation Detail</h3>
                    <button onclick="closeModal()" class="text-white hover:text-gray-200">&times;</button>
                </div>
                <div id="modalContent" class="p-4">Loading...</div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    const visitors = @json($visitors->items());
    let map = null;

    function openModal(id) {
        const v = visitors.find(x => x.id === id);
        if (!v) return;

        document.getElementById('detailModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        const hasLocation = v.pickup_latitude && v.pickup_longitude;
        
        document.getElementById('modalContent').innerHTML = `
            <div class="space-y-3 text-sm">
                <div><span class="text-gray-500">Visitor:</span> <b>${v.user.name}</b></div>
                <div><span class="text-gray-500">Email:</span> ${v.user.email}</div>
                <div><span class="text-gray-500">Phone:</span> ${v.user.phone || '-'}</div>
                <hr>
                <div><span class="text-gray-500">Destination:</span> <b>${v.destination.name}</b></div>
                <div><span class="text-gray-500">Date:</span> ${new Date(v.date).toLocaleDateString('id-ID', {weekday:'long', day:'numeric', month:'long', year:'numeric'})}</div>
                <div><span class="text-gray-500">Persons:</span> ${v.person}</div>
                <div><span class="text-gray-500">Duration:</span> ${v.duration} day(s)</div>
                <div><span class="text-gray-500">Distance:</span> ${v.distance_in_km ? v.distance_in_km + ' km' : '-'}</div>
                <div><span class="text-gray-500">Total:</span> <b class="text-secondary">Rp ${parseInt(v.total_price).toLocaleString('id-ID')}</b></div>
                <div><span class="text-gray-500">Status:</span> ${v.status}</div>
                <hr>
                <div><span class="text-gray-500">Pickup Location:</span></div>
                <div class="text-xs text-gray-600">${v.pickup_location || '-'}</div>
                ${hasLocation ? `<div id="pickupMap" class="w-full h-48 rounded-lg mt-2"></div>` : '<div class="text-gray-400 text-center py-4">No location data</div>'}
            </div>
        `;

        if (hasLocation) {
            setTimeout(() => {
                if (map) { map.remove(); map = null; }
                map = L.map('pickupMap').setView([v.pickup_latitude, v.pickup_longitude], 14);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                L.marker([v.pickup_latitude, v.pickup_longitude]).addTo(map).bindPopup('Pickup').openPopup();
                if (v.destination.latitude && v.destination.longitude) {
                    L.marker([v.destination.latitude, v.destination.longitude], {
                        icon: L.icon({
                            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                            iconSize: [25, 41], iconAnchor: [12, 41]
                        })
                    }).addTo(map).bindPopup(v.destination.name);
                }
            }, 100);
        }
    }

    function closeModal() {
        document.getElementById('detailModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
        if (map) { map.remove(); map = null; }
    }

    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });
</script>
@endsection
