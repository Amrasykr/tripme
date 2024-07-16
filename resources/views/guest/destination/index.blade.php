@extends('layouts.user')

@section('title', 'Destinations')

@section('content')

    {{-- Top 1 --}}
    <div class="relative mt-24" >
        <div class="px-3 md:px-14">
            <div class="relative">
                <a href="#">
                    <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full md:h-[43rem] object-cover rounded-2xl">
                    <div class="absolute inset-0 bg-black opacity-45 rounded-2xl z-10"></div>
                    <div class="absolute inset-0 flex flex-col items-start justify-end ml-4 pb-4 md:ml-10 md:pb-10  z-20 ">
                        <h3 class="text-2xl md:text-6xl text-white font-bold tracking-wider uppercase ">
                            Curug Cimarunjung
                        </h3>
                        <p class="text-sm md:text-2xl text-white font-light">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <p class="text-xs md:text-sm text-white font-light">
                            5 Bulan yang Lalu <span class="mx-1 md:mx-2 font-extralight "><b>·</b></span> 24 Pengunjung
                        </p>
                        <div class="py-1 px-4 bg-yellow-700 text-xs md:text-sm my-2 text-white rounded-2xl text-center">
                            Waterfall
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- All Destinations --}}
    <div class="my-10 md:my-20">
        <div class="flex flex-col items-center text-center">
            <div class="text-3xl md:text-7xl font-light text-gray-900" >
                Our Destinations
            </div>

            <div class="md:flex space-y-5 md:space-y-0 space-x-0 md:space-x-8 md:mt-8 w-full px-8 md:px-24">
                <div class="w-full md:w-1/3  bg-white shadow-xl p-5 rounded-xl">
                    <a href="#">
                        <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full  object-cover rounded-2xl">
                        <div class="py-1 bg-purple-700 text-sm  text-white w-1/3 my-3 rounded-2xl mx-1">
                            Waterfall
                        </div>
                        <h3 class="text-start text-3xl font-medium tracking-wide mx-1">
                        Curug Cimarunjung
                        </h3>
                        <p class="text-start text-xl my-2 mx-1 font-light "> 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </a>
                </div>
                <div class="w-full md:w-1/3  bg-white shadow-xl p-5 rounded-xl">
                    <a href="#">
                        <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full  object-cover rounded-2xl">
                        <div class="py-1 bg-purple-700 text-sm  text-white w-1/3 my-3 rounded-2xl mx-1">
                            Waterfall
                        </div>
                        <h3 class="text-start text-3xl font-medium tracking-wide mx-1">
                        Curug Cimarunjung
                        </h3>
                        <p class="text-start text-xl my-2 mx-1 font-light "> 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </a>
                </div>
                <div class="w-full md:w-1/3  bg-white shadow-xl p-5 rounded-xl">
                    <a href="#">
                        <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full  object-cover rounded-2xl">
                        <div class="py-1 bg-purple-700 text-sm  text-white w-1/3 my-3 rounded-2xl mx-1">
                            Waterfall
                        </div>
                        <h3 class="text-start text-3xl font-medium tracking-wide mx-1">
                        Curug Cimarunjung
                        </h3>
                        <p class="text-start text-xl my-2 mx-1 font-light "> 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
    </script>
@endsection
    