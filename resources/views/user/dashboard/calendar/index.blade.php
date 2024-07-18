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
                            $reservation = $reservations->firstWhere('date', $date->toDateString());
                        @endphp
                        <div class="px-3 md:h-20 border border-secondary rounded-md">
                            <div class="mt-2">{{ $day }}</div>
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
                    @endfor
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
    </script>
@endsection
