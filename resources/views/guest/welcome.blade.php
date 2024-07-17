@extends('layouts.user')

@section('title', 'Homepage')

@section('content')
    {{-- Hero --}}
    <div class="relative mt-24" data-aos="fade-up">
        <div class="px-3 md:px-14">
            <div class="relative">
                <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full md:h-[43rem] object-cover rounded-2xl">
                <div class="absolute inset-0 bg-black opacity-45 rounded-2xl z-10"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center z-20 ">
                    <img src="{{ asset('images/logo-white.png') }}" alt="logo" class="w-32 md:w-80 mb-2 mt-5">
                    <h1 class="text-white font-light text-xl md:text-7xl mt-2">Explore <span class="auto-type-status"></span></h1>
                    <h3 class="text-4xl md:text-8xl text-white font-bold tracking-wider uppercase ">
                        sukabumi
                    </h3>
                    <a href="{{ url('/#top') }}" class="py-1 px-2 md:py-2 md:px-4   bg-purple-700 hover:bg-white text-white hover:text-purple-700 text-lg md:text-2xl mt-6 rounded-lg transition-all duration-500 ease-in-out">
                        Let's Go  <span><i class="fa-solid fa-arrow-right text-white hover:text-purple-700 text-lg md:text-3xl ml-2 "></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- services --}}
    <div class="mt-10 md:mt-20">
        <div class="flex flex-col items-center text-center">
            <div class="text-3xl md:text-7xl font-light text-gray-900" data-aos="zoom-in">
                Make Every Journey Memorable
            </div>
            <div class="mt-[-1.5rem] md:mt-4 flex items-center text-3xl md:text-7xl font-light text-gray-900" data-aos="zoom-in">
                With <span class="flex items-center space-x-1 md:space-x-2 mx-1 md:mx-4">
                    <img src="{{ asset('images/ammar.jpeg') }}" alt="user" class="w-6 h-6 md:w-14 md:h-14 object-cover object-center my-8 rounded-full">
                    <img src="{{ asset('images/amanda.jpeg') }}" alt="user" class="w-6 h-6 md:w-14 md:h-14 object-cover object-bottom my-8 rounded-full">
                    <img src="{{ asset('images/erik.jpeg') }}" alt="user" class="w-6 h-6 md:w-14 md:h-14 object-cover object-bottom my-8 rounded-full">
                </span> Us
            </div>
            <div class="md:flex md:space-x-8 space-y-8 md:space-y-0 mt-0 md:mt-8 w-full px-12 md:px-24" data-aos="fade-up">
                <div class="w-full md:w-1/3 bg-purple-700 rounded-xl text-white shadow-xl">
                    <h3 class="text-2xl md:text-4xl font-medium pt-5 md:pt-10">
                        Adventure Tours
                    </h3>
                    <i class="text-6xl md:text-8xl my-5 md:my-10 fa-solid fa-person-hiking"></i>
                    <p class="text-lg md:text-xl font-light text-center px-8 pb-5 md:pb-10">
                        Immerse yourself in local cultures and traditions with our curated cultural experiences.
                    </p>
                </div>
                <div class="w-full md:w-1/3 bg-purple-700 rounded-xl text-white shadow-xl">
                    <h3 class="text-2xl md:text-4xl font-medium pt-5 md:pt-10">
                        Cultural Experiences
                    </h3>
                    <i class="text-6xl md:text-8xl my-5 md:my-10 fa-solid fa-globe"></i>
                    <p class="text-lg md:text-xl font-light text-center px-8 pb-5 md:pb-10">
                        Explore thrilling adventures with our expert guides to make your trip unforgettable.
                    </p>
                </div>
                <div class="w-full md:w-1/3 bg-purple-700 rounded-xl text-white shadow-xl">
                    <h3 class="text-2xl md:text-4xl font-medium pt-5 md:pt-10">
                        Luxury Retreats
                    </h3>
                    <i class="text-6xl md:text-8xl my-5 md:my-10 fa-solid fa-star"></i>
                    <p class="text-lg md:text-xl font-light text-center px-8 pb-5 md:pb-10">
                        Indulge in luxury accommodations and personalized services for the ultimate getaway.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Top 3 Destinations --}}
    <div class="my-10 md:my-20" id="top">
        <div class="flex flex-col items-center text-center">
            <div class="text-3xl md:text-7xl font-light text-gray-900" data-aos="zoom-in">
                Top 3 Destinations
            </div>

            <div class="md:flex space-y-5 md:space-y-0 space-x-0 md:space-x-8 md:mt-8 w-full px-8 md:px-24">
                <div class="w-full md:w-1/3  bg-white shadow-xl p-5 rounded-xl" data-aos="fade-up">
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
                <div class="w-full md:w-1/3  bg-white shadow-xl p-5 rounded-xl" data-aos="fade-up">
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
                <div class="w-full md:w-1/3  bg-white shadow-xl p-5 rounded-xl" data-aos="fade-up">
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

        // Type Animation
        var typedStatus = new Typed(".auto-type-status", {
            strings : ["Hidden Gems in", "the Beauty of", "Breathtaking Landscapes of", "Vibrant Cultures"],
            typeSpeed : 100,
            backSpeed : 80,
            
            loop : true
        })

        
        // Scroll Animation
        AOS.init({
            duration: 2500
        });

    </script>
@endsection