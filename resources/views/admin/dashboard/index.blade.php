<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}    
    </x-slot>

    <div class="py-4">
        <div class="md:flex md:space-x-20">
            <!-- Card 1 -->
            <div class="w-full md:w-1/3 rounded-lg p-4 mb-4 flex items-center justify-start space-x-6 shadow-xl bg-white">
                <div class=" rounded-full bg-purple-700 w-20 h-20 flex items-center justify-center">
                    <i class="fa-solid fa-mountain-sun text-4xl text-white "></i>
                </div>
                <div>
                    <h1 class="text-5xl font-bold text text-purple-600 font-sans">{{$total_destinations}}</h1>
                    <h3 class="text-xl font-semibold text-gray-700 mt-2">Total Destinations</h3>
                </div>
            </div>
    
            <!-- Card 2 -->
            <div class="w-full md:w-1/3  rounded-lg p-4 mb-4 flex items-center justify-start space-x-6 shadow-xl bg-white">
                <div class=" rounded-full bg-orange-700 w-20 h-20 flex items-center justify-center">
                    <i class="fa-solid fa-users text-4xl text-white "></i>
                </div>
                <div>
                    <h1 class="text-5xl font-bold text text-purple-600 font-sans">{{$total_users}}</h1>
                    <h3 class="text-xl font-semibold text-gray-700 mt-2">Total Users</h3>
                </div>
            </div>
    
            <!-- Card 3 -->
            <div class="w-full md:w-1/3 rounded-lg p-4 mb-4 flex items-center justify-start space-x-6 shadow-xl bg-white">
                <div class=" rounded-full bg-blue-700 w-20 h-20 flex items-center justify-center">
                    <i class="fa-solid fa-glasses text-4xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-5xl font-bold text text-purple-600 font-sans">{{$total_visitors}}</h1>
                    <h3 class="text-xl font-semibold text-gray-700 mt-2">Total Visitors</h3>
                </div>
            </div>

        </div>


        <div class="mt-4 md:flex md:space-x-5">
            <div class="w-full md:w-3/5 bg-white p-4 shadow-xl rounded-lg">
                <canvas id="myChart"></canvas>
            </div>
            <div class="w-full md:w-2/5 relative overflow-x-auto shadow-lg sm:rounded-xl mt-5 md:mt-0">
                <div class="flex flex-wrap sm:space-y-0 items-center justify-between p-4 bg-gray-200">
                    <form action="/admin/dashboard">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" id="table-search" class="block p-2 pl-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
                    </form>
                    </div>
                </div>
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-sm text-white uppercase bg-purple-600">
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
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $item->destination_name }}</th>
                            <td class="px-6 py-4">{{ $item->total_visitors }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
          var chart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
              datasets: [{
                label: 'Visitors',
                data: [12, 19, 3, 5, 2, 3, 14],
                backgroundColor: 'rgb(180, 51, 3)',
                borderColor: 'rgb(126, 58, 241)',
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
</x-app-layout>
