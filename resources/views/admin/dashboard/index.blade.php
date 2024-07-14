<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}    
    </x-slot>

    <div class="py-6">
        <div class="md:flex md:space-x-24">
            <!-- Card 1 -->
            <div class="rounded-lg p-4 mb-4 flex items-center justify-center shadow-md bg-white">
                <i class="fas fa-chart-line text-4xl text-blue-600 mr-4"></i>
                <div>
                    <h3 class="text-xl font-semibold text-blue-800">Analytics</h3>
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
    
            <!-- Card 2 -->
            <div class="rounded-lg p-4 mb-4 flex items-center justify-center shadow-md bg-white">
                <i class="fas fa-users text-4xl text-green-600 mr-4"></i>
                <div>
                    <h3 class="text-xl font-semibold text-green-800">Users</h3>
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
    
            <!-- Card 3 -->
            <div class="rounded-lg p-4 mb-4 flex items-center justify-center shadow-md bg-white">
                <i class="fas fa-calendar-alt text-4xl text-yellow-600 mr-4"></i>
                <div>
                    <h3 class="text-xl font-semibold text-yellow-800">Calendar</h3>
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>


        <div class="mt-8">
            <div class="relative overflow-x-auto shadow-lg sm:rounded-xl">
                <div class="flex flex-wrap sm:space-y-0 items-center justify-between p-4 bg-gray-200">
                    <div>
                        <button id="createUserButton" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-md text-sm px-3 py-2">
                            <i class="fas fa-plus text-gray-500 mr-2"></i>
                            Create User
                        </button>
                    </div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" class="block p-2 pl-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
                    </div>
                </div>
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-sm text-white uppercase bg-purple-600">
                        <tr>
                            <th scope="col" class="p-4 w-16"></th>
                            <th scope="col" class="px-6 py-3 w-1/3">Product name</th>
                            <th scope="col" class="px-6 py-3 w-1/4">Color</th>
                            <th scope="col" class="px-6 py-3 w-1/4">Category</th>
                            <th scope="col" class="px-6 py-3 w-1/4">Price</th>
                            <th scope="col" class="px-6 py-3 w-24">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <i class="fas fa-user-circle text-blue-600"></i>
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap w-1/3">Apple MacBook Pro 17"</th>
                            <td class="px-6 py-4 w-1/4">Silver</td>
                            <td class="px-6 py-4 w-1/4">Laptop</td>
                            <td class="px-6 py-4 w-1/4">$2999</td>
                            <td class="px-6 py-4 w-24">
                                <a href="#" class="font-medium text-green-400 hover:underline">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="font-medium text-yellow-400 hover:underline">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="font-medium text-red-400 hover:underline">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Tambahkan baris data lainnya sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
              
        </div>
    </div>
</x-app-layout>
