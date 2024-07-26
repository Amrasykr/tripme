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
            <div class="text-3xl md:text-7xl font-light text-tertiary" data-aos="zoom-in">
                Make Every Journey Memorable
            </div>
            <div class="mt-[-1.5rem] md:mt-4 flex items-center text-3xl md:text-7xl font-light text-tertiary" data-aos="fade-up" data-aos-duration="2200">
                With <span class="flex items-center space-x-1 md:space-x-2 mx-1 md:mx-4">
                    <img src="{{ asset('images/ammar.jpeg') }}" alt="user" class="w-6 h-6 md:w-14 md:h-14 object-cover object-center my-8 rounded-full">
                    <img src="{{ asset('images/erik.jpeg') }}" alt="user" class="w-6 h-6 md:w-14 md:h-14 object-cover object-bottom my-8 rounded-full">
                </span> Us
            </div>
            <div class="md:flex md:space-x-8 space-y-8 md:space-y-0 mt-0 md:mt-8 w-full">
                <div class="w-full md:w-1/3 bg-secondary rounded-xl text-white shadow-xl" data-aos="fade-up" data-aos-duration="2200">
                    <h3 class="text-2xl md:text-4xl font-base pt-5 md:pt-10">
                        Adventure Tours
                    </h3>
                    <i class="text-6xl md:text-8xl my-5 md:my-10 fa-solid fa-person-hiking"></i>
                    <p class="text-lg md:text-lg font-light text-center px-8 pb-5 md:pb-10">
                        Immerse yourself in local cultures and traditions with our curated cultural experiences.
                    </p>
                </div>
                <div class="w-full md:w-1/3 bg-secondary rounded-xl text-white shadow-xl" data-aos="fade-up" data-aos-duration="2300">
                    <h3 class="text-2xl md:text-4xl font-base pt-5 md:pt-10">
                        Cultural Experiences
                    </h3>
                    <i class="text-6xl md:text-8xl my-5 md:my-10 fa-solid fa-globe"></i>
                    <p class="text-lg md:text-lg font-light text-center px-8 pb-5 md:pb-10">
                        Explore thrilling adventures with our expert guides to make your trip unforgettable.
                    </p>
                </div>
                <div class="w-full md:w-1/3 bg-secondary rounded-xl text-white shadow-xl" data-aos="fade-up" data-aos-duration="2400">
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

    {{-- travel --}}
    <div class="mt-10 md:mt-20 px-4 md:px-0 container ">
        <div class="md:flex justify-between md:space-x-10">
            <img src="{{asset('/images/travel.jpg')}}" class="hidden md:block h-[20rem] md:h-[38rem] w-full md:w-7/12 object-cover object-center rounded-2xl" alt="travel" data-aos="fade-right">
            <div class="flex flex-col w-full md:w-5/12">
                <div class="text-center md:text-start text-sm md:text-lg text-secondary/60" data-aos="zoom-in">
                    Your Journey Awaits
                </div>
                <div class="text-center text-3xl md:text-start md:text-6xl text-tertiary md:mt-2 font-light" data-aos="zoom-in" >
                    Discover Your Travel
                </div>
                <div class="mt-8 h-full  flex flex-col space-y-3" data-aos="fade-left" data-aos-duration="2200">
                    <div class="h-1/4 rounded-2xl hover:bg-secondary/10 hover:translate-y-0.5 transition-all duration-500 ease-in-out" >
                        <div class="flex h-full">
                            <div class="m-3.5 w-1/6 flex justify-center items-start">
                                <div class="p-3 w-16 rounded-2xl bg-tertiary/10 flex justify-center">
                                    <i class="fa-solid fa-suitcase text-xl  text-tertiary"></i>
                                </div>
                            </div>
                            <div class="mx-3.5 my-3 w-5/6  flex flex-col justify-between">
                                <div class="text-xl font-medium text-tertiary">
                                    Customizable Travel Plans
                                </div>
                                <div class="text-sm md:text-md mb-2 font-light text-tertiary/50">
                                    Choose from a variety of travel options tailored to your needs. Travel your way, any day, with flexibility and comfort.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1/4 rounded-2xl hover:bg-secondary/10 hover:translate-y-0.5 transition-all duration-500 ease-in-out" >
                        <div class="flex h-full">
                            <div class="m-3.5 w-1/6 flex justify-center items-start">
                                <div class="p-3 w-16 rounded-2xl bg-tertiary/10 flex justify-center">
                                    <i class="fa-solid fa-credit-card text-xl  text-tertiary"></i>
                                </div>
                            </div>
                            <div class="mx-3.5 my-3 w-5/6  flex flex-col justify-between">
                                <div class="text-xl font-medium text-tertiary">
                                    Easy Payment Options
                                </div>
                                <div class="text-sm md:text-md mb-2 font-light text-tertiary/50">
                                    Enjoy hassle-free payments anytime with our flexible payment gateway. Pay at your convenience, whether you're at home.                               
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1/4 rounded-2xl hover:bg-secondary/10 hover:translate-y-0.5 transition-all duration-500 ease-in-out" >
                        <div class="flex h-full">
                            <div class="m-3.5 w-1/6 flex justify-center items-start">
                                <div class="p-3 w-16 rounded-2xl bg-tertiary/10 flex justify-center">
                                    <i class="fa-solid fa-ticket-alt text-xl  text-tertiary"></i>
                                </div>
                            </div>
                            <div class="mx-3.5 my-3 w-5/6  flex flex-col justify-between">
                                <div class="text-xl font-medium text-tertiary">
                                    Instant E-Ticketing
                                </div>
                                <div class="text-sm md:text-md mb-2 font-light text-tertiary/50">
                                    Receive your tickets instantly with every reservation. No more waiting or printing; just book and go with ease.                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1/4 rounded-2xl hover:bg-secondary/10 hover:translate-y-0.5 transition-all duration-500 ease-in-out">
                        <div class="flex h-full">
                            <div class="m-3.5 w-1/6 flex justify-center items-start">
                                <div class="p-3 w-16 rounded-2xl bg-tertiary/10 flex justify-center">
                                    <i class="fa-solid fa-calendar-alt text-xl  text-tertiary"></i>
                                </div>
                            </div>
                            <div class="mx-3.5 my-3 w-5/6  flex flex-col justify-between">
                                <div class="text-xl font-medium text-tertiary">
                                    Capacity & Schedule View                                
                                </div>
                                <div class="text-sm md:text-md mb-2 font-light text-tertiary/50">
                                    Easily check destination capacities and view detailed reservation schedules with our user-friendly calendar feature.                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    {{-- Top 3 Destinations --}}
    <div class="my-10 md:my-20 container px-4 md:px-0" id="top">
        <div class="flex flex-col items-center text-center">
            <div class="text-3xl md:text-7xl font-light text-gray-900">
                Our Destinations
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-6 md:mt-8 w-full" data-aos="fade-up" data-aos-duration="2200">
                @foreach ($top_3_destinations as $destination)
                <div class="hover:bg-second_white shadow-xl p-5 rounded-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500 ease-in-out">
                    <a href="/destination/{{$destination->id}}">
                        <img src="{{ asset('assets/tumbnail_image/'.$destination->main_image) }}" alt="hero" class="w-full h-72 object-cover rounded-2xl">
                        <div class="py-1 bg-tertiary text-sm text-white w-1/3 my-3 md:my-5 rounded-2xl mx-1">
                            {{$destination->category}}
                        </div>
                        <h3 class="text-start text-tertiary text-3xl font-medium tracking-wide mx-1">
                            {{$destination->name}}
                        </h3>
                        <p class="text-start text-tertiary text-xl my-2 mx-1 font-light">
                            {{$destination->description}}
                        </p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Review --}}
    <div class="my-10 md:my-20 px-4 md:px-0 container">
        <div class="text-3xl md:text-7xl font-light text-gray-900 text-center">
            Exquisite Testimonials
        </div>
        <div class="carousel w-full">
            @php
                $chunks = $reviews->chunk(3);
            @endphp
            @foreach ($chunks as $chunkIndex => $chunk)
            <div id="slide{{ $chunkIndex + 1 }}" class="carousel-item relative w-full" data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-auto">
                    @foreach ($chunk as $index => $review)
                    <div class="bg-second_white rounded-2xl p-4 w-full flex flex-col items-center mt-10 mb-5">
                        <img src="{{ asset('/assets/user_image/' . $review->reservation->user->image) }}" alt="user" class="w-20 h-20 rounded-full object-cover">
                        <div class="mt-3 text-tertiary font-light text-3xl">
                            {{ $review->reservation->user->name }}
                        </div>
                        <div>
                            @php
                            $rating = $review->rating;
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa-solid fa-star {{ $i <= $rating ? 'text-secondary' : 'text-gray-300' }}"></i>
                            @endfor
                        </div>
                        <div class="w-4/5 text-lg text-tertiary font-normal text-center mt-5">
                            {{ $review->content }}
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                    <a href="#slide{{ $chunkIndex == 0 ? count($chunks) : $chunkIndex }}" class="btn btn-circle bg-secondary text-white hover:bg-tertiary">❮</a>
                    <a href="#slide{{ $chunkIndex == count($chunks) - 1 ? 1 : $chunkIndex + 2 }}" class="btn btn-circle bg-secondary text-white hover:bg-tertiary">❯</a>
                </div>
            </div>
            @endforeach
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
            duration: 2000
        });

    </script>
@endsection