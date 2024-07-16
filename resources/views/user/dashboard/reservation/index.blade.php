

@extends('layouts.user-dashboard')

@section('title', 'Main Dashboard')

@section('content')

    {{-- Hero User Dasboard --}}
    <div class="mt-28 md:mt-32 mb-10 mx-8 md:mx-20">
        <div class="md:flex justify-between md:space-x-10">
            <div class="w-full md:w-1/2">
                <h1 class="text-3xl md:text-4xl font-semibold text-purple-700">
                    Hello, {{Auth::user()->name}} 👋
                </h1>
                <h1 class="text-xl md:text-2xl font-light text-gray-900 mt-5">
                    Welcome To User Dashboard ✨
                </h1>
                <p class="text-md md:text-xl font-light text-gray-900">
                    Experience seamless travel planning with our comprehensive user dashboard. 
                    Manage bookings, explore new destinations, and access personalized insights for a tailored journey every time.
                </p>
            </div>
            <div class="w-full md:w-1/2 items-end">
                <div class="md:flex justify-between md:space-x-4 mt-5 md:mt-16">
                    <div class="w-full md:w-1/3 rounded-lg px-5 py-4 mb-4 flex items-center justify-between shadow-xl bg-purple-200">
                        <div>
                            <h1 class="text-5xl font-bold text text-purple-600 font-sans">{{$pending_reservation}}</h1>
                            <h3 class="text-xl font-light text-gray-700 ">Pending</h3>
                        </div>
                        <div class="mt-[-2rem]">
                            <i class="fa-solid fa-clock text-4xl text-purple-600"></i>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3  rounded-lg px-5 py-4  mb-4 flex items-center justify-between shadow-xl bg-orange-200">
                        <div>
                            <h1 class="text-5xl font-bold text text-orange-600 font-sans">{{$confirmed_reservation}}</h1>
                            <h3 class="text-xl font-light text-gray-700 ">Confirmed</h3>
                        </div>
                        <div class="mt-[-2rem]">
                            <i class="fa-solid fa-calendar text-4xl text-orange-600"></i>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3  rounded-lg px-5 py-4  mb-4 flex items-center justify-between shadow-xl bg-gray-200">
                        <div>
                            <h1 class="text-5xl font-bold text text-gray-600 font-sans">{{$finished_reservation}}</h1>
                            <h3 class="text-xl font-light text-gray-700 ">Done</h3>
                        </div>
                        <div class="mt-[-2rem]">
                            <i class="fa-solid fa-circle-check text-4xl text-gray-600 "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Divider --}}
    <div class="mx-8 md:mx-20">
        <div class="h-[2px] bg-gray-500 mt-1"></div>
    </div>

    {{-- Navigation and Content --}}
    <div class="my-10 mx-10">
        <div class="md:flex justify-between ">
            {{-- Navigation --}}
            <div class="w-full md:w-2/5 grid grid-rows-2 grid-cols-2 gap-x-5 gap-y-10 md:gap-6 md:px-20 py-5 h-96">
                <a href="/user/dashboard/ticket">
                    <div class="bg-purple-200 flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                        <i class="fa-solid fa-ticket text-4xl text-purple-600"></i>
                        <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-purple-600">
                            Ticket
                        </p>
                    </div>
                </a>
                <a href="/user/dashboard/calendar">
                    <div class="bg-orange-200 flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                        <i class="fa-solid fa-calendar text-4xl text-orange-600"></i>
                        <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-orange-600">
                            Calendar
                        </p>
                    </div>
                </a>
                <a href="/user/dashboard/reservation">
                    <div class="bg-gray-300 flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                        <i class="fa-solid fa-clock text-4xl text-gray-600"></i>
                        <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-gray-600">
                            Reservation
                        </p>
                    </div>
                </a>
                <a href="/user/dashboard">
                    <div class="bg-blue-200 flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                        <i class="fa-solid fa-user text-4xl text-blue-600"></i>
                        <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-blue-600">
                            Profil
                        </p>
                    </div>
                </a>
            </div>
            {{-- Content --}}
            <div class="w-full md:w-3/5">
                <div class="w-[26rem] mt-8 md:mt-0 md:w-full block overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex flex-wrap sm:space-y-0 items-center justify-between p-4 bg-gray-200">
                        <form action="{{ route('user.dashboard.reservation') }}" method="GET" class="flex items-center">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" name="search" id="table-search" class="block p-2 pl-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search" value="{{ request('search') }}">
                            </div>
                        </form>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-sm text-white uppercase bg-purple-600">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-1/4">Destination</th>
                                <th scope="col" class="px-6 py-3 w-1/4">Date</th>
                                <th scope="col" class="px-6 py-3 w-1/4">Status</th>
                                <th scope="col" class="px-6 py-3 w-1/4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @empty($reservation->all())
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-lg">There is no reservation</td>
                                </tr>
                            @endempty
                            @foreach ($reservation as $rsvp)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 w-1/4">{{ $rsvp->destination->name }}</td>
                                <td class="px-6 py-4 w-1/4">{{ \Carbon\Carbon::parse($rsvp->date)->translatedFormat('l, j F Y') }}</td>
                                <td class="px-6 py-4 w-1/4">{{ $rsvp->status }}</td>
                                <td class="px-4 py-6 w-24 flex space-x-3 items-center">
                                    @if ($rsvp->status === 'pending' || $rsvp->status === 'rejected' || $rsvp->status === 'canceled' || $rsvp->status === 'on going')
                                        <p class="text-gray-700 font-extrabold">-</p>
                                    @elseif ($rsvp->status === 'confirmed')
                                        <form action="/user/dashboard/reservation/{{ $rsvp->id }}/confirm" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="font-medium text-green-400 hover:underline text-lg" title="Confirm">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </form>
                                        <form action="/user/dashboard/reservation/{{ $rsvp->id }}/cancel" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="font-medium text-red-400 hover:underline text-lg" title="Reject">
                                                <i class="fa-solid fa-ban"></i>
                                            </button>
                                        </form>
                                    @elseif ($rsvp->status === 'finished')
                                        <form action="/user/dashboard/reservation/{{ $rsvp->id }}/review" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="font-medium text-yellow-400 hover:underline text-lg" title="Create Review">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>                 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="px-4 py-3 bg-white border-t border-gray-200 sm:flex sm:justify-between">
                        {{-- {{ $reservation->withQueryString()->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
    </script>
@endsection


