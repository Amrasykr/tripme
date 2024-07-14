<x-app-layout>
    <x-slot name="header">
        All Destination
    </x-slot>
    <div class="mb-10">
        <div class="w-80 md:w-full block overflow-x-auto shadow-lg sm:rounded-xl">
            <div class="flex sm:space-y-0 items-center justify-between p-4 space-x-5 md:space-x-0 bg-gray-200">
                <div>
                    <a href="/admin/dashboard/destination/create" class="inline-flex items-center text-white hover:text-black bg-green-600 border border-gray-300 focus:outline-none hover:bg-green-300 focus:ring-4 focus:ring-gray-100 font-medium rounded-md text-sm px-3 py-2">
                        <i class="fas fa-plus  mr-2"></i>
                        Create Destinations
                    </a>                    
                </div>
                <form action="{{ route('admin.dashboard.destination') }}" method="GET">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" name="search" class="block p-2 pl-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search" value="{{ $search ?? '' }}">
                    </div>
                </form>
            </div>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-sm text-white uppercase bg-purple-600">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-1/3">Name</th>
                        <th scope="col" class="px-6 py-3 w-1/4">Address</th>
                        <th scope="col" class="px-6 py-3 w-1/4">Category</th>
                        <th scope="col" class="px-6 py-3 w-1/4">Created At</th>
                        <th scope="col" class="px-6 py-3 w-24">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @empty($destinations->all())
                    <tr>
                        <td colspan="4" class="text-center py-5 text-lg">There is no destination</td>
                    </tr>
                    @endempty
                    @foreach ($destinations as $destination)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <div class="p-2">
                                        <img src="{{ asset('assets/tumbnail_image/'. $destination->main_image) }}" alt="destination image" class="rounded-lg w-16 h-12 object-cover object-center">
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">{{ $destination->name}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $destination->address }}</td>
                        <td class="px-6 py-4 ">{{ $destination->category }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($destination->created_at)->translatedFormat('l, j F Y') }}</td>
                        <td class="px-3 py-7 w-24 flex space-x-3 items-center">
                            <a href="/admin/dashboard/destination/{{$destination->id}}" class="font-medium text-green-400 hover:underline text-lg">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/admin/dashboard/destination/{{$destination->id}}/edit" class="font-medium text-yellow-400 hover:underline text-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="/admin/dashboard/destination/{{$destination->id}}/delete" method="POST">
                                @csrf
                                <button class="font-medium text-red-400 hover:underline text-lg">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                @method('DELETE')
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="px-4 py-3 bg-white border-t border-gray-200 sm:flex sm:justify-between">
                {{ $destinations->withQueryString()->links() }}
            </div>
        </div>
    </div>

</x-app-layout>
