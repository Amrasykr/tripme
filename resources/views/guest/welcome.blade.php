@extends('layouts.user')

@section('title', 'Homepage')

@section('content')

    {{-- Hero --}}
    <div class="relative mt-24 container" data-aos="fade-up">
        <div class="px-4 md:px-0" >
            <div class="relative">
                <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full md:h-[43rem] object-cover rounded-2xl">
                <div class="absolute inset-0 bg-black/40 rounded-2xl z-10"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center z-20 ">
                    <img src="{{ asset('images/logo-white.svg') }}" alt="logo" class="w-28 md:w-52 mb-4 md:mb-28 mt-5">
                    <div class="text-center mb-4 md:mb-24">
                        <h1 class="text-white font-light text-xl md:text-4xl tracking-tight">Explore <span class="auto-type-status"></span></h1>
                        <h3 class="text-4xl md:text-9xl text-white font-bold tracking-tight">
                            Sukabumi
                        </h3>
                    </div>
                    <a href="{{ url('/#top') }}" class="py-1 px-4 md:py-3 md:px-8 bg-second_white hover:bg-alternate text-tertiary  text-lg md:text-2xl mt-6 rounded-full transition-all duration-500 ease-in-out">
                        Let's Go  <span><i class="fa-solid fa-arrow-right text-tertiary text-lg md:text-xl ml-2 "></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- services --}}
    <div class="mt-10 md:mt-20 px-4 md:px-0 container">
        <div class="flex flex-col items-center text-center">
            <div class="text-3xl md:text-7xl font-light text-tertiary" >
                Make Every Journey Memorable
            </div>
            <div class="mt-[-1.5rem] md:mt-4 flex items-center text-3xl md:text-7xl font-light text-tertiary" >
                With <span class="flex items-center space-x-1 md:space-x-2 mx-1 md:mx-4">
                    <img src="{{ asset('images/ammar.jpeg') }}" alt="user" class="w-6 h-6 md:w-14 md:h-14 object-cover object-center my-8 rounded-full">
                    <img src="{{ asset('images/erik.jpeg') }}" alt="user" class="w-6 h-6 md:w-14 md:h-14 object-cover object-bottom my-8 rounded-full">
                </span> Us
            </div>
            <div class="md:flex md:space-x-8 space-y-8 md:space-y-0 mt-0 md:mt-8 w-full" >
                <div class="w-full md:w-1/3 bg-secondary rounded-xl text-white shadow-xl">
                    <h3 class="text-2xl md:text-4xl font-base pt-5 md:pt-10">
                        Adventure Tours
                    </h3>
                    <i class="text-6xl md:text-8xl my-5 md:my-10 fa-solid fa-person-hiking"></i>
                    <p class="text-lg md:text-lg font-light text-center px-8 pb-5 md:pb-10">
                        Immerse yourself in local cultures and traditions with our curated cultural experiences.
                    </p>
                </div>
                <div class="w-full md:w-1/3 bg-secondary rounded-xl text-white shadow-xl">
                    <h3 class="text-2xl md:text-4xl font-base pt-5 md:pt-10">
                        Cultural Experiences
                    </h3>
                    <i class="text-6xl md:text-8xl my-5 md:my-10 fa-solid fa-globe"></i>
                    <p class="text-lg md:text-lg font-light text-center px-8 pb-5 md:pb-10">
                        Explore thrilling adventures with our expert guides to make your trip unforgettable.
                    </p>
                </div>
                <div class="w-full md:w-1/3 bg-secondary rounded-xl text-white shadow-xl">
                    <h3 class="text-2xl md:text-4xl font-base pt-5 md:pt-10">
                        Luxury Retreats
                    </h3>
                    <i class="text-6xl md:text-8xl my-5 md:my-10 fa-solid fa-star"></i>
                    <p class="text-lg md:text-lg font-light text-center px-8 pb-5 md:pb-10">
                        Indulge in luxury accommodations and personalized services for the ultimate getaway.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Top 3 Destinations --}}
    <div class="my-10 md:my-20" id="top">
        <div class="flex flex-col items-center text-center px-4 md:px-0 container">
            <div class="text-3xl md:text-7xl font-light text-tertiary">
                Top  Destinations
            </div>
            <div class="md:flex space-y-8 md:space-y-0 space-x-0 md:space-x-8 mt-6 md:mt-8 w-full md:justify-center">
                <div class="w-full md:w-1/3  hover:bg-second_white  shadow-xl p-5 rounded-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-1000 ease-in-out"  >
                    <a href="#">
                        <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full  object-cover rounded-2xl">
                        <div class="py-1 bg-tertiary text-sm  text-white w-1/3 my-3 rounded-2xl mx-1">
                            Waterfall
                        </div>
                        <h3 class="text-start text-tertiary text-3xl font-medium tracking-wide mx-1">
                        Curug Cimarunjung
                        </h3>
                        <p class="text-start text-tertiary text-xl my-2 mx-1 font-light "> 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </a>
                </div>
                <div class="w-full md:w-1/3  hover:bg-second_white  shadow-xl p-5 rounded-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-1000 ease-in-out"  >
                    <a href="#">
                        <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full  object-cover rounded-2xl">
                        <div class="py-1 bg-tertiary text-sm  text-white w-1/3 my-5 rounded-2xl mx-1">
                            Waterfall
                        </div>
                        <h3 class="text-start text-tertiary text-3xl font-medium tracking-wide mx-1">
                        Curug Cimarunjung
                        </h3>
                        <p class="text-start text-tertiary text-xl my-2 mx-1 font-light "> 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </a>
                </div>
                <div class="w-full md:w-1/3  hover:bg-second_white  shadow-xl p-5 rounded-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-1000 ease-in-out"  >
                    <a href="#">
                        <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full  object-cover rounded-2xl">
                        <div class="py-1 bg-tertiary text-sm  text-white w-1/3 my-3 rounded-2xl mx-1">
                            Waterfall
                        </div>
                        <h3 class="text-start text-tertiary text-3xl font-medium tracking-wide mx-1">
                        Curug Cimarunjung
                        </h3>
                        <p class="text-start text-tertiary text-xl my-2 mx-1 font-light "> 
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