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
                            <h3 class="text-lg font-light text-tertiary/80">Finished</h3>
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
                    <div class="bg-primary hover:bg-primary flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                        <i class="fa-solid fa-calendar text-4xl text-tertiary/70"></i>
                        <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-tertiary">
                            Calendar
                        </p>
                    </div>
                </a>
                <a href="/user/dashboard/reservation">
                    <div class="bg-alternate hover:bg-primary flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
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
            <div class="hidden md:block w-full md:w-3/5 mx-auto mt-10 md:mt-0">
                <div class="flex justify-between mb-4">
                    <button onclick="
                        const currentYear = {{ $year }};
                        const currentMonth = {{ $month }};
                        let newYear = currentYear;
                        let newMonth = currentMonth - 1;
                
                        if (newMonth < 1) {
                            newMonth = 12;
                            newYear -= 1;
                        }
                
                        const url = `?year=${newYear}&month=${newMonth}`;
                        window.location.href = url;
                    " class="px-4 py-2 bg-secondary text-white hover:bg-tertiary transition-all duration-300 ease-in-out rounded-full hidden md:inline-block">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <div>
                        <span id="month-year" class="text-xl font-semibold tracking-wide text-tertiary">{{ \Carbon\Carbon::create($year, $month)->format('F Y') }}</span>
                    </div>
                    <button onclick="
                        const currentYear = {{ $year }};
                        const currentMonth = {{ $month }};
                        let newYear = currentYear;
                        let newMonth = currentMonth + 1;
                
                        if (newMonth > 12) {
                            newMonth = 1;
                            newYear += 1;
                        }
                
                        const url = `?year=${newYear}&month=${newMonth}`;
                        window.location.href = url;
                    " class="px-4 py-2 bg-secondary text-white hover:bg-tertiary transition-all duration-300 ease-in-out rounded-full hidden md:inline-block">
                        <i class="fa-solid fa-arrow-right"></i>    
                    </button>
                    <div class="flex md:hidden">
                        <button onclick="
                            const currentYear = {{ $year }};
                            const currentMonth = {{ $month }};
                            let newYear = currentYear;
                            let newMonth = currentMonth - 1;
                    
                            if (newMonth < 1) {
                                newMonth = 12;
                                newYear -= 1;
                            }
                    
                            const url = `?year=${newYear}&month=${newMonth}`;
                            window.location.href = url;
                        " class="px-2 py-1 bg-secondary text-white hover:bg-tertiary transition-all duration-300 ease-in-out rounded-full">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <span id="month-year" class="text-xl font-medium tracking-wide mx-2">{{ \Carbon\Carbon::create($year, $month)->format('F Y') }}</span>
                        <button onclick="
                            const currentYear = {{ $year }};
                            const currentMonth = {{ $month }};
                            let newYear = currentYear;
                            let newMonth = currentMonth + 1;
                    
                            if (newMonth > 12) {
                                newMonth = 1;
                                newYear += 1;
                            }
                    
                            const url = `?year=${newYear}&month=${newMonth}`;
                            window.location.href = url;
                        " class="px-2 py-1 bg-secondary text-white hover:bg-tertiary transition-all duration-300 ease-in-out rounded-full">
                            <i class="fa-solid fa-arrow-right"></i>    
                        </button>
                    </div>
                </div>                
            
                <div class="grid grid-cols-7 gap-4">
                    @foreach (['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                        <div class="text-center font-base text-md text-tertiary">{{ $day }}</div>
                    @endforeach
                
                    @php
                        $daysInMonth = \Carbon\Carbon::create($year, $month)->daysInMonth;
                        $firstDayOfMonth = \Carbon\Carbon::create($year, $month, 1)->dayOfWeek;
                    @endphp
                
                    @for ($i = 0; $i < $firstDayOfMonth; $i++)
                        <div></div>
                    @endfor
                
                    @for ($day = 1; $day <= $daysInMonth; $day++)
                        @php
                            $date = \Carbon\Carbon::create($year, $month, $day);
                        @endphp
                        <button onclick="showModal('{{ $date->toDateString() }}')">
                            <div class="text-start px-3 md:h-20 border border-secondary rounded-md">
                                <div class="mt-1">{{ $day }}</div>
                                @php
                                    $reservation = $reservations->firstWhere('date', $date->toDateString());
                                @endphp
                                @if ($reservation)
                                    <div class="mt-1.5">
                                        <div class="text-[0.6rem] font-semibold text-tertiary">{{ $reservation->destination->name }}</div>
                                        @if ($reservation->status === 'confirmed' || $reservation->status === 'finished')
                                            <div class="text-[0.7rem] font-semibold text-primary"><b>·</b> {{ $reservation->status}}</div>
                                        @elseif ($reservation->status === 'canceled' || $reservation->status === 'rejected')
                                            <div class="text-[0.7rem] font-semibold text-red-600"><b>·</b> {{ $reservation->status}}</div>
                                        @else
                                            <div class="text-[0.7rem] font-semibold text-yellow-600"><b>·</b> {{ $reservation->status}}</div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </button>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box w-11/12 max-w-6xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Destinations <span id="selected-date"></span></h3>
            <div class="grid grid-cols-2 grid-rows-3 gap-4 mt-6" id="destination-list">
                    @foreach ($destinations as $destination)
                        @php
                            $capacity_today = $capacities[$destination->id] ?? 0;
                        @endphp
                        <a href="/destination/{{$destination->id}}">
                            <div class="bg-second_white h-28 rounded-lg  flex justify-between ">
                                <div class="m-2 flex space-x-2">
                                    <img src="{{ asset('assets/tumbnail_image/' . $destination->main_image) }}" class="rounded-md w-24 object-cover object-center">
                                    <div class="flex flex-col justify-between">
                                        <div class="text-md text-tertiary font-semibold">
                                            {{$destination->name}}
                                        </div>
                                        <div class="text-xs text-secondary">
                                            Rp. {{ number_format($destination->price) }} per person
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col m-2 justify-between">
                                    <div class="font-medium text-white text-center text-xs bg-secondary rounded-full py-1 mt-0.5">
                                        {{$destination->category}}
                                    </div>
                                    <div class="text-xs text-secondary text-end">
                                        *available for {{$capacity_today}} person
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
            </div>
        </div>
    </dialog>


@endsection

@section('script')
<script>
    function showModal(date) {
        const url = `?year={{ $year }}&month={{ $month }}&date=${date}`;
        fetch(url)
            .then(response => response.text())
            .then(html => {
                document.querySelector('body').innerHTML = html;
                document.getElementById('selected-date').innerText = date;
                my_modal_3.showModal();
            });
    }
</script>
@endsection
