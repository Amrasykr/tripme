

@extends('layouts.user-dashboard')

@section('title', 'Main Dashboard')

@section('content')

            {{-- Hero User Dasboard --}}
            <div class="mt-28 md:mt-32 mb-10 container px-6 md:px-0">
                <div class="md:flex justify-between md:space-x-10">
                    <div class="w-full md:w-1/2">
                        <h1 class="text-3xl md:text-4xl font-semibold text-secondary">
                            Hello, {{Auth::user()->name}} 👋
                        </h1>
                        <h1 class="text-xl md:text-2xl font-light text-tertiary mt-5">
                            Welcome To User Dashboard ✨
                        </h1>
                        <p class="text-md md:text-xl font-light text-tertiary">
                            Experience seamless travel planning with our comprehensive user dashboard. 
                            Manage bookings, explore new destinations, and access personalized insights for a tailored journey every time.
                        </p>
                    </div>
                    <div class="w-full md:w-1/2 items-end">
                        <div class="md:flex justify-between md:space-x-4 mt-5 md:mt-16">
                            <div class="w-full md:w-1/3 rounded-lg px-5 pb-4 pt-10 mb-4 flex items-center justify-between shadow-xl bg-alternate">
                                <div>
                                    <h1 class="text-5xl font-bold text text-tertiary font-sans">{{$pending_reservation}}</h1>
                                    <h3 class="text-lg font-light text-tertiary/80">Pending</h3>
                                </div>
                                <div class="mt-[-6rem]">
                                    <i class="fa-solid fa-clock text-4xl text-tertiary/70"></i>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 rounded-lg px-5 pb-4 pt-10 mb-4 flex items-center justify-between shadow-xl bg-alternate">
                                <div>
                                    <h1 class="text-5xl font-bold text text-tertiary font-sans">{{$confirmed_reservation}}</h1>
                                    <h3 class="text-lg font-light text-tertiary/80">Confirmed</h3>
                                </div>
                                <div class="mt-[-6rem]">
                                    <i class="fa-solid fa-clock text-4xl text-tertiary/70"></i>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 rounded-lg px-5 pb-4 pt-10 mb-4 flex items-center justify-between shadow-xl bg-alternate">
                                <div>
                                    <h1 class="text-5xl font-bold text text-tertiary font-sans">{{$finished_reservation}}</h1>
                                    <h3 class="text-lg font-light text-tertiary/80">finished</h3>
                                </div>
                                <div class="mt-[-6rem]">
                                    <i class="fa-solid fa-clock text-4xl text-tertiary/70"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            {{-- Divider --}}
            <div class="container px-6 md:px-0">
                <div class="h-[2px] bg-tertiary/50 mt-1"></div>
            </div>
        
            {{-- Navigation and Content --}}
            <div class="my-10 container px-6 md:px-0">
                <div class="md:flex justify-between ">
                    {{-- Navigation --}}
                    <div class="w-full md:w-2/5 grid grid-rows-2 grid-cols-2 gap-x-5 gap-y-10 md:gap-6 md:px-20 py-5 h-96">
                        <a href="/user/dashboard/ticket">
                            <div class="bg-alternate hover:bg-primary flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                                <i class="fa-solid fa-ticket text-4xl text-tertiary/70"></i>
                                <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-tertiary">
                                    Ticket
                                </p>
                            </div>
                        </a>
                        <a href="/user/dashboard/calendar">
                            <div class="bg-alternate hover:bg-primary flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                                <i class="fa-solid fa-calendar text-4xl text-tertiary/70"></i>
                                <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-tertiary">
                                    Calendar
                                </p>
                            </div>
                        </a>
                        <a href="/user/dashboard/reservation">
                            <div class="bg-primary hover:bg-primary flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                                <i class="fa-solid fa-clock text-4xl text-tertiary/70"></i>
                                <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-tertiary">
                                    Reservation
                                </p>
                            </div>
                        </a>
                        <a href="/user/dashboard">
                            <div class="bg-alternate hover:bg-primary flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                                <i class="fa-solid fa-user text-4xl text-tertiary/70"></i>
                                <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-tertiary">
                                    Profil
                                </p>
                            </div>
                        </a>
                    </div>
                    {{-- Content --}}
                    <div class="w-full md:w-3/5">
                        <div class="w-[26rem] mt-8 md:mt-0 md:w-full block overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="flex flex-wrap sm:space-y-0 items-center justify-between p-4 bg-second_white">
                                <form action="{{ route('user.dashboard.reservation') }}" method="GET" class="flex items-center">
                                    <label for="table-search" class="sr-only text-tertiary">Search</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-tertiary" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input type="text" name="search" id="table-search" class="block p-2 pl-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search" value="{{ request('search') }}">
                                    </div>
                                </form>
                            </div>
                            <table class="w-full text-sm text-left text-tertiary">
                                <thead class="text-sm text-white uppercase bg-tertiary">
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
                                    <tr class="bg-white border-b" onclick="detail.showModal()">       
                                        <td class="px-6 py-4 w-1/4">{{ $rsvp->destination->name }}</td>
                                        <td class="px-6 py-4 w-1/4">{{ \Carbon\Carbon::parse($rsvp->date)->translatedFormat('l, j F Y') }}</td>
                                        <td class="px-6 py-4 w-1/4">{{ $rsvp->status }}</td>
                                        <td class="px-4 py-6 w-24 flex space-x-1 items-center">
                                            <button onclick="document.getElementById('detail-{{ $rsvp->id }}').showModal()" class="font-medium text-tertiary  text-xs bg-slate-300 rounded-full px-3 py-2" title="detail">
                                                Detail
                                            </button>
                                            <dialog id="detail-{{ $rsvp->id }}" class="modal">
                                                <div class="modal-box">
                                                    <form method="dialog">
                                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                                    </form>
                                                    <div class="flex justify-between mt-6 items-center">
                                                        <h3 class="text-lg font-bold">Your Reservation Detail</h3>
                                                        <div class="font-medium text-tertiary  text-xs bg-slate-300 rounded-full py-1 px-2">
                                                            {{$rsvp->status}}
                                                        </div>
                                                    </div>
                                                    <div class="bg-second_white h-20 rounded-lg mt-4 flex justify-between">
                                                        <div class="m-2 flex space-x-2">
                                                            <img src="{{ asset('assets/tumbnail_image/' .$rsvp->destination->main_image ) }}" class="rounded-md w-24 object-cover object-center">
                                                            <div class="flex flex-col justify-between">
                                                                <div class="text-md text-tertiary font-semibold">
                                                                   {{$rsvp->destination->name}}
                                                                </div>
                                                                <div class="text-xs text-secondary">
                                                                    </i> Rp. {{ number_format($rsvp->destination->price)}} 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col m-2 justify-between">
                                                            <div class="text-md text-tertiary font-semibold ">
                                                                Rp. {{ number_format($rsvp->destination->price * $rsvp->person) }}
                                                            </div>
                                                            <div class="text-xs text-secondary text-end">
                                                                *for {{$rsvp->person}} person
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    @if ($rsvp->travel_id)
                                                    <p class="mt-2 mb-1 mx-1 text-xs font-semibold">
                                                        Your Travel
                                                    </p>
                                                    <div class="border border-tertiary rounded-lg  flex justify-between">
                                                        <div class="m-2 flex flex-col justify-between space-y-3 ">
                                                            <div class="text-md text-tertiary font-semibold">
                                                               {{$rsvp->travel->name}}
                                                            </div>
                                                            <div class="text-xs text-secondary">
                                                                </i> Rp. {{number_format($rsvp->travel->price)}} 
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col justify-between space-y-3 m-2 ">
                                                            <div class="text-md text-tertiary font-semibold ">
                                                                Rp. {{ number_format($rsvp->travel->price_per_km * $rsvp->distance_in_km + $rsvp->travel->price) }}
                                                            </div>
                                                            <div class="text-xs text-secondary text-end">
                                                                *for {{$rsvp->distance_in_km}} km
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="flex justify-between space-x-2 mt-6">
                                                        <p class="mb-1 mx-1 text-md font-semibold">
                                                            Total Price
                                                        </p>
                                                        <div class="flex flex-col space-y-1">
                                                            <p class="mb-1 mx-1 text-lg font-semibold">
                                                                Rp. {{number_format($rsvp->total_price)}}
                                                            </p>
                                                            @if ($rsvp->status == 'unpaid')
                                                            <button type="submit" class="font-semibold text-tertiary text-md bg-alternate hover:bg-secondary hover:text-white transition-all duration-300 ease-in-out rounded-full px-3 py-2" title="payment">
                                                                Payment
                                                            </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </dialog>
                                            @if ($rsvp->status === 'unpaid')
                                                <form action="/user/dashboard/reservation/{{ $rsvp->id }}/buy" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="font-medium text-tertiary  text-xs bg-alternate rounded-full px-3 py-2" title="payment">
                                                            Payment
                                                    </button>
                                                </form>
                                                <form action="/user/dashboard/reservation/{{ $rsvp->id }}/cancel" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="font-medium text-tertiary  text-xs bg-red-300 rounded-full px-3 py-2" title="cancel">
                                                        Cancel
                                                </button>
                                                </form>
                                            @elseif ($rsvp->status === 'confirmed')
                                            <form action="/user/dashboard/reservation/{{ $rsvp->id }}/confirm" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="font-medium text-tertiary  text-xs bg-blue-300 rounded-full px-3 py-2" title="finish">
                                                    Finish
                                            </button>
                                            </form>
                                                <form action="/user/dashboard/reservation/{{ $rsvp->id }}/cancel" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="font-medium text-tertiary  text-xs bg-red-300 rounded-full px-3 py-2" title="cancel">
                                                        Cancel
                                                    </button>
                                                </form>
                                            @elseif ($rsvp->status === 'rejected' || $rsvp->status === 'paid and pending')
                                                <!-- No actions to display -->
                                            @elseif ($rsvp->status === 'finished')
                                                @if ($rsvp->review)
                                                    <p class="text-gray-700 font-extrabold">-</p>
                                                @else
                                                    <button onclick="document.getElementById('review-{{ $rsvp->id }}').showModal()"  class="font-medium text-tertiary  text-xs bg-yellow-300 rounded-full px-3 py-2" title="create review">
                                                        Review
                                                    </button>
                                                    <dialog id="review-{{ $rsvp->id }}" class="modal">
                                                        <div class="modal-box">
                                                            <form method="dialog">
                                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                                            </form>
                                                            <h3 class="text-lg font-bold">Hello!</h3>
                                                            <p class="py-4">We will respond well to your review</p>
                                                            <form action="/user/dashboard/reservation/{{$rsvp->id}}/review" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="w-full mb-4">
                                                                    <label for="rating" class="block text-tertiary text-sm font-bold mb-2">Rating</label>
                                                                    <select id="rating" name="rating" 
                                                                            class="appearance-none block w-full bg-second_white text-tertiary border-none @error('rating') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white">
                                                                        <option value="" disabled selected>Select rating</option>
                                                                        <option value="1">Bad</option>
                                                                        <option value="2">Poor</option>
                                                                        <option value="3">Average</option>
                                                                        <option value="4">Good</option>
                                                                        <option value="5">Excellent</option>
                                                                    </select>
                                                                    @error('rating')
                                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                                    @enderror
                                                                </div>   
                                                                <div class="w-full mb-4">
                                                                    <label for="content" class="block text-tertiary text-sm font-bold mb-2">Content</label>
                                                                    <textarea id="content" name="content" rows="4"
                                                                              class="appearance-none block w-full bg-second_white text-tertiary border-none @error('content') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white"></textarea>
                                                                    @error('content')
                                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                                <div class="mt-2 flex justify-end">
                                                                    <button type="submit" class="bg-secondary text-white px-6 py-2 shadow-lg rounded-md">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </dialog>
                                                @endif
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
        function showReviewModal() {
            var reviewModal = document.getElementById('review');
            if (reviewModal) {
                reviewModal.showModal();
            }
        }

        function showDetailModal() {
            var detailModal = document.getElementById('review');
            if (detailModal) {
                detailModal.showModal();
            }
        }

    </script>
@endsection


