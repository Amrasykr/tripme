@extends('layouts.user')

@section('title', 'About')

@section('content')

    {{-- Hero --}}
    <div class="relative mt-28">
        <div class="px-3 md:px-14">
            <div class="relative">
                <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full md:h-[43rem] object-cover rounded-2xl">
                <div class="absolute inset-0 bg-black opacity-45 rounded-2xl z-10"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center z-20 ">
                    <img src="{{ asset('images/logo-white.png') }}" alt="logo" class="w-32 md:w-80 mb-2 mt-5">
                    <h1 class="text-white font-light text-xl md:text-7xl mt-2">Helping Communities Thrive in</h1>
                    <h3 class="text-4xl md:text-8xl text-white font-bold tracking-wider uppercase ">
                        sukabumi
                    </h3>
                    <a href="{{ url('/about#why') }}" class="py-1 px-2 md:py-2 md:px-4   bg-purple-700 hover:bg-white text-white hover:text-purple-700 text-lg md:text-2xl mt-6 rounded-lg transition-all duration-500 ease-in-out">
                        Why ? <span><i class="fa-solid fa-arrow-right text-white text-lg md:text-3xl ml-2"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Why --}}
    <div class="my-10 md:my-20 px-3 md:px-14" id="why">
        <div class="md:flex justify-between space-x-0 md:space-x-8">
            <div class="w-full md:w-1/2 mb-10 md:mb-0">
                <p class="text-2xl font-medium text-purple-700">
                    Why Choose Our Services?
                </p>
                <h1 class="text-3xl md:text-5xl font-light tracking-wide mt-2">
                    Enhancing the Well-being of Sukabumi Residents
                </h1>
                <p class="text-md md:text-xl font-light mt-4 md:mt-16 ">
                    We are committed to enriching the lives of Sukabumi residents through sustainable tourism practices. 
                    By showcasing Sukabumi's cultural and natural wealth, we aim to boost economic growth and community development. 
                    Our efforts have resulted in significant impacts: a 50% increase in tourist visits, 
                    revitalizing local businesses; a 30% decrease in unemployment, creating new job opportunities; a 40% rise in local income, empowering communities; and a 25% improvement in infrastructure, enhancing connectivity and facilities for residents and visitors alike.
                </p>
            </div>
            <div class="w-full md:w-1/2 space-y-4 flex flex-col items-center">
                <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full h-64 object-cover rounded-2xl">
                <div class="grid grid-cols-2 grid-rows-2 gap-4 md:gap-x-56 md:gap-y-9">
                    <div>
                        <h1 class="text-2xl md:text-4xl font-semibold text-purple-700 tracking-widest">
                            50%
                        </h1>
                        <h4 class="text-md md:text-xl font-light text-gray-900">
                            Increase in Tourist Visits
                        </h4>  
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-4xl font-semibold text-purple-700 tracking-widest">
                            30%
                        </h1>
                        <h4 class="text-md md:text-xl font-light text-gray-900">
                            Reduction in Unemployment
                        </h4>  
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-4xl font-semibold text-purple-700 tracking-widest">
                            40%
                        </h1>
                        <h4 class="text-md md:text-xl font-light text-gray-900">
                            Increase in Local Income
                        </h4>  
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-4xl font-semibold text-purple-700 tracking-widest">
                            25%
                        </h1>
                        <h4 class="text-md md:text-xl font-light text-gray-900">
                            Improvement in Infrastructure
                        </h4>  
                    </div>
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
