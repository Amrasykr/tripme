@extends('layouts.app')

@section('title', 'Main Dashboard')

@section('header')
    <h2 class="text-4xl font-medium text-secondary">
        Main Dashboard
    </h2>
@endsection

@section('content')

    <div class="py-4">

        {{-- Cards --}}
        <div class="md:flex md:space-x-20">
            <!-- Card 1 -->
            <div class="w-full md:w-1/3 rounded-lg p-4 mb-4 flex items-center justify-start space-x-6 shadow-xl bg-white">
                <div class=" rounded-full bg-tertiary/70 w-20 h-20 flex items-center justify-center">
                    <i class="fa-solid fa-mountain-sun text-4xl text-white "></i>
                </div>
                <div>
                    <h1 class="text-5xl font-bold text text-secondary font-sans">{{$total_destinations}}</h1>
                    <h3 class="text-xl font-semibold text-tertiary mt-2">Total Destinations</h3>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="w-full md:w-1/3  rounded-lg p-4 mb-4 flex items-center justify-start space-x-6 shadow-xl bg-white">
                <div class=" rounded-full bg-tertiary/70 w-20 h-20 flex items-center justify-center">
                    <i class="fa-solid fa-users text-4xl text-white "></i>
                </div>
                <div>
                    <h1 class="text-5xl font-bold text text-secondary font-sans">{{$total_users}}</h1>
                    <h3 class="text-xl font-semibold text-tertiary mt-2">Total Users</h3>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="w-full md:w-1/3 rounded-lg p-4 mb-4 flex items-center justify-start space-x-6 shadow-xl bg-white">
                <div class=" rounded-full bg-tertiary/70 w-20 h-20 flex items-center justify-center">
                    <i class="fa-solid fa-glasses text-4xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-5xl font-bold text text-secondary font-sans">{{$total_visitors}}</h1>
                    <h3 class="text-xl font-semibold text-tertiary mt-2">Total Visitors</h3>
                </div>
            </div>

        </div>
        
        {{-- Data --}}
        <div class="mt-4 mx-auto md:flex md:space-x-5">
            {{-- Line Chart --}}
            <div class="w-full md:w-3/5 bg-white p-4 shadow-xl rounded-lg">
                <canvas id="myChart"></canvas>
            </div>
            {{-- Table --}}
            <div class="w-[28rem] md:w-2/5 block overflow-x-auto shadow-lg rounded-lg mt-5 md:mt-0">
                <div class="flex flex-wrap sm:space-y-0 items-center justify-between p-4 bg-second_white">
                    <form action="/admin/dashboard">
                        <label for="table-search" class="sr-only text-tertiary">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-tertiary" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" id="table-search" class="block p-2 pl-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
                    </form>
                    </div>
                </div>
                <table class="w-full text-sm text-left text-tertiary">
                    <thead class="text-sm text-white uppercase bg-tertiary">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-1/2">Destination</th>
                            <th scope="col" class="px-6 py-3 w-1/2">Total Visitors</th>
                        </tr>
                    </thead>
                    <tbody>
                        @empty($total_visitors_by_reservations->all())
                            <tr>
                                <td colspan="6" class="text-center py-5 text-lg">There is no data</td>
                            </tr>
                        @endempty
                        @foreach ($total_visitors_by_reservations as $item)
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $item->destination_name }}</th>
                            <td class="px-6 py-4">{{ $item->total_visitors }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <!-- Pagination Links -->
                    {{-- <div class="px-4 py-3 bg-white border-t border-gray-200 ">
                        {{ $total_visitors_by_reservations->withQueryString()->links() }}
                    </div> --}}
                </table>
            </div>    
        </div>
    </div>

@endsection

@section('script')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var visitorsData = @json($visitors_data);
        
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
            labels: Object.keys(visitorsData),
            datasets: [{
                label: 'Visitors',
                data: Object.values(visitorsData),
                backgroundColor: 'rgb(120, 197, 38)',
                borderColor: 'rgb(43, 111, 43)',
                borderWidth: 1
            }]
            },
            options: {
            responsive: true,
            scales: {
                yAxes: [{
                ticks: {
                    beginAtZero: true
                }
                }]
            }
            }
        });
    </script>
@endsection

