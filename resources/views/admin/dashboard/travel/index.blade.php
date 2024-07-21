@extends('layouts.app')

@section('title', 'Travels Dashboard')

@section('header')
    <h2 class="text-4xl font-medium text-secondary">
        All Travel
    </h2>
@endsection

@section('content')

<div class="mb-10">
    <div class="w-80 md:w-full block overflow-x-scroll shadow-lg sm:rounded-xl">
        <div class="flex sm:space-y-0 items-center justify-between p-4 space-x-5 md:space-x-0 bg-second_white">
            <div>
                <a href="/admin/dashboard/travel/create" class="inline-flex items-center text-white bg-secondary hover:bg-tertiary border focus:outline-none  focus:ring-4  font-medium rounded-md text-sm px-3 py-2">
                    <i class="fas fa-plus  mr-2"></i>
                    Create Travel
                </a>                    
            </div>
            <form action="{{ route('admin.dashboard.travel') }}" method="GET">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-tertiary" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" name="search" class="block p-2 pl-8 text-sm text-tertiary rounded-lg bg-white" placeholder="Search" value="{{ $search ?? '' }}">
                </div>
            </form>
        </div>
        <table class="w-full text-sm text-left text-tertiary">
            <thead class="text-sm text-white uppercase bg-tertiary">
                <tr>
                    <th scope="col" class="px-6 py-3 w-1/3">Travel Name</th>
                    <th scope="col" class="px-6 py-3 w-1/4">Price</th>
                    <th scope="col" class="px-6 py-3 w-1/4">Price Per KM</th>
                    <th scope="col" class="px-6 py-3 w-1/4">Description</th>
                    <th scope="col" class="px-6 py-3 w-24">Action</th>
                </tr>
            </thead>
            <tbody>
                @empty($travels->all())
                <tr>
                    <td colspan="6" class="text-center py-5 text-lg">There is no travel</td>
                </tr>
            @endempty
                @foreach ($travels as $travel)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 w-1/4">{{ $travel->name }}</td>
                    <td class="px-6 py-4 w-1/4">{{ $travel->price }}</td>
                    <td class="px-6 py-4 w-1/4">{{ $travel->price_per_km }}</td>
                    <td class="px-6 py-4 w-1/4">{{ $travel->description }}</td>
                    <td class="px-6 py-6 w-24 flex space-x-3 items-center">
                        <a href="/admin/dashboard/travel/{{$travel->id}}/edit" class="font-medium text-yellow-600 hover:underline text-lg">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="/admin/dashboard/travel/{{$travel->id}}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                            <button href="#" class="font-medium text-red-600 hover:underline text-lg">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="px-4 py-3 bg-white border-t border-gray-200 ">
            {{ $travels->withQueryString()->links() }}
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>

    </script>
@endsection
