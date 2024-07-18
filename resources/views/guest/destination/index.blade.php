@extends('layouts.user')

@section('title', 'Destinations')

@section('content')

    {{-- Top 1 --}}
    <div class="relative mt-24" data-aos="fade-up">
        <div class="px-4 md:px-0 container" >
            <div class="relative">
                <a href="#">
                    <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full md:h-[43rem] object-cover rounded-2xl">
                    <div class="absolute inset-0 bg-black opacity-45 rounded-2xl z-10"></div>
                    <div class="absolute inset-0 flex flex-col items-start justify-end ml-4 pb-4 md:ml-10 md:pb-10 z-20">
                        <h3 class="text-2xl md:text-7xl text-white font-semibold tracking-tight mb-2">
                            Curug Cimarinjung
                        </h3>
                        <p class="text-sm md:text-3xl text-white font-light tracking-tight">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <div class="my-1 md:mt-3 md:mb-1 w-2/3 md:w-4/12">
                            <p class="w-fulltext-xs md:text-sm text-white font-light">
                                5 Bulan yang Lalu <span class="mx-1 md:mx-2 font-extralight "><b>·</b></span> 24 Pengunjung
                            </p>
                            <a href="https://maps.app.goo.gl/havk3PsogusN7VqF6" class="w-full" target="_blank">
                                <p class="text-xs md:text-sm text-white font-light">
                                    <span class="font-extralight"><i class="fa-solid fa-location-dot text-white"></i></span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint impedit magnam eum cum nostrum sequi.
                                </p>
                            </a>                 
                        </div>
                        <div class="w-1/4 md:w-2/12">
                            <div class="w-full py-1 px-4 md:px-10 bg-second_white text-xs md:text-sm my-2 text-tertiary rounded-2xl text-center">
                                Lorem, ipsum.
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- All Destinations --}}
    <div class="my-10 md:my-20 container px-4 md:px-0">
        <div class="flex flex-col items-center text-center">
            <div class="text-3xl md:text-7xl font-light text-gray-900" >
                Our Destinations
            </div>

            <div class="md:flex space-y-8 md:space-y-0 space-x-0 md:space-x-8 mt-6 md:mt-8 w-full ">
                @foreach ($destinations as $destination)
                <div class="w-full md:w-1/3  hover:bg-second_white  shadow-xl p-5 rounded-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-1000 ease-in-out"  >
                    <a href="/destination/{{$destination->id}}">
                        <img src="{{ asset('assets/tumbnail_image/'.$destination->main_image) }}" alt="hero" class="w-full h-72 object-cover rounded-2xl">
                        <div class="py-1 bg-tertiary text-sm  text-white w-1/3 my-3 md:my-5 rounded-2xl mx-1">
                            {{$destination->category}}
                        </div>
                        <h3 class="text-start text-tertiary text-3xl font-medium tracking-wide mx-1">
                        {{$destination->name}}
                        </h3>
                        <p class="text-start text-tertiary text-xl my-2 mx-1 font-light "> 
                            {{$destination->description}}
                        </p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Scroll Animation
        AOS.init({
            duration: 2500
        });
    </script>
@endsection
    