@extends('layouts.app')

@section('title', 'Reviews Dashboard')

@section('header')
    <h2 class="text-4xl font-medium text-secondary">
        All Reviews
    </h2>
@endsection

@section('content')

    <div class="w-80 md:w-full block overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex flex-wrap sm:space-y-0 items-center justify-between p-4 bg-second_white">
            <form action="{{ route('admin.dashboard.review') }}" method="GET" class="flex items-center">
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
                    <th scope="col" class="px-6 py-3 w-1/3">Reviewer</th>
                    <th scope="col" class="px-6 py-3 w-1/4">Rating</th>
                    <th scope="col" class="px-6 py-3 w-1/4">Status</th>
                    <th scope="col" class="px-6 py-3 w-1/4">Created At</th>
                    <th scope="col" class="px-6 py-3 w-24">Action</th>
                </tr>
            </thead>
            <tbody>
                @empty($reviews->all())
                    <tr>
                        <td colspan="6" class="text-center py-5 text-lg">There is no review</td>
                    </tr>
                @endempty
                @foreach ($reviews as $review)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="p-2">
                                    @if ($review->reservation->user->image)
                                    <img src="{{ asset('assets/user_image/'. $review->reservation->user->image) }}" alt="user image" class="rounded-full w-12">
                                    @else
                                    <img src="{{ asset('images/user-default.png') }}" alt="user image" class="rounded-full w-12">
                                    @endif                                
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">{{ $review->reservation->user->name}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 w-1/4">
                        @php
                            $rating = $review->rating;
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa-solid fa-star {{ $i <= $rating ? 'text-yellow-300' : 'text-gray-300' }} {{ $i <= $rating ? 'filled' : 'border' }}"></i>
                        @endfor
                    </td>
                    
                    <td class="px-6 py-4 w-1/4">{{ $review->status }}</td>
                    <td class="px-6 py-4 w-1/4">{{ \Carbon\Carbon::parse($review->created_at)->translatedFormat('l, j F Y') }}</td>
                    <td class="px-4 py-6 flex space-x-3">
                        @if ($review->status === 'draft')
                        <form action="/admin/dashboard/review/{{$review->id}}/publish" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="font-medium text-tertiary text-xs bg-alternate rounded-full px-3 py-2" id="payment-button">
                                Publish
                            </button> 
                        </form>
                        @else
                        <form action="/admin/dashboard/review/{{$review->id}}/draft" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="font-medium text-tertiary text-xs bg-yellow-300 rounded-full px-3 py-2" id="payment-button">
                                Draft
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
            {{ $reviews->withQueryString()->links() }}
        </div>
    </div>


@endsection

@section('script')
    <script>

    </script>
@endsection

