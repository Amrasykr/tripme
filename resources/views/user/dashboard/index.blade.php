
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
                        <div class="bg-gray-200 flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                            <i class="fa-solid fa-clock text-4xl text-gray-600"></i>
                            <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-gray-600">
                                Reservation
                            </p>
                        </div>
                    </a>
                    <a href="/user/dashboard">
                        <div class="bg-blue-300 flex flex-col space-y-1 justify-center items-center rounded-xl shadow-lg h-40">
                            <i class="fa-solid fa-user text-4xl text-blue-600"></i>
                            <p class="text-xl md:text-2xl pt-2 font-semibold tracking-wide uppercase text-blue-600">
                                Profil
                            </p>
                        </div>
                    </a>
                </div>
                {{-- Content --}}
                <div class="w-full md:w-3/5">
                    <form class="w-full bg-white p-8 shadow-xl rounded-lg" method="POST" enctype="multipart/form-data" action="/user/dashboard/{{ Auth::user()->id }}/update">
                        @csrf
                        @method('PATCH')
                        <div class="flex justify-center items-center">
                            @if (Auth::user()->image)
                            <img src="{{ asset('assets/user_image/' . Auth::user()->image) }}" alt="user" class="w-36 rounded-full">
                            @else
                            <img src="{{ asset('images/user-default.png') }}" alt="user" class="w-36 rounded-full">
                            @endif
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-3 mt-10">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</label>
                                <input id="name" name="name" type="text" value={{Auth::user()->name}} class="appearance-none block w-full bg-gray-200 text-gray-700 border-none @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                                @error('name')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label for="image" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Image</label>
                                <input id="image" name="image" type="file" class="appearance-none block w-full bg-gray-200 text-gray-700 border-none @error('image') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                                
                                @if (Auth::user()->image)
                                    <p class="text-gray-500 text-xs italic">{{ Auth::user()->image }}</p>
                                @else
                                    <p class="text-gray-500 text-xs italic">Default User Image</p>
                                @endif
                                
                                @error('image')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>                        
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full px-3">
                                <label for="Email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email</label>
                                <input id="Email" name="email" type="text" value={{Auth::user()->email}}  class="appearance-none block w-full bg-gray-200 text-gray-700 border-none @error('email') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                                @error('email')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mt-2 flex justify-end">
                            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 shadow-lg rounded-md">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('script')
    <script>
    </script>
@endsection






