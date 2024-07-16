@extends('layouts.user')

@section('title', 'Curug Cimarunjung')

@section('content')

    {{-- Hero --}}
    <div class="relative mt-24">
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
                        <button class="py-1 px-2 md:py-2 md:px-4 font-medium  bg-purple-700 hover:bg-white text-white hover:text-purple-700 text-lg md:text-2xl mt-4 md:mt-6 rounded-lg transition-all duration-500 ease-in-out">
                            Book <span><i class="fa-solid fa-arrow-right" class="text-white text-lg md:text-3xl"></i></span>
                        </button>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- content --}}
    <div class="px-3 md:px-14 my-10">
        <div class="flex justify-between md:space-x-8">
            <div class="w-full md:px-40">
                <p class="text-lg text-gray-900 ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur beatae ab officiis nostrum temporibus ducimus ex, adipisci saepe aliquid totam distinctio quasi optio eligendi provident ratione perspiciatis omnis. Quod doloribus voluptas a beatae nostrum consequuntur numquam! Quasi suscipit doloremque optio cupiditate recusandae nesciunt, tempora, consectetur corporis ut blanditiis enim ad?
                </p>
            </div>
        </div>
    </div>

    {{-- Gallery --}}
    <div class="my-10 md:my-20">
        <div class="flex flex-col items-center text-center">
            <div class="text-3xl md:text-7xl font-light text-gray-900">
                Gallery
            </div>
            <div class="grid grid-cols-2 grid-rows-2 gap-4 md:gap-10 mt-10 mx-10">
                <div class="w-52 md:w-96">
                    <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full object-cover rounded-2xl">
                </div>
                <div class="w-52 md:w-96">
                    <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full object-cover rounded-2xl">
                </div>
                <div class="w-52 md:w-96">
                    <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full object-cover rounded-2xl">
                </div>
                <div class="w-52 md:w-96">
                    <img src="{{ asset('images/hero.jpg') }}" alt="hero" class="w-full object-cover rounded-2xl">
                </div>
            </div>
        </div>
    </div>

    {{-- related destination --}}
    <div class="my-10 md:my-20">
        <div class="flex flex-col items-center text-center">
            <div class="text-3xl md:text-7xl font-light text-gray-900">
                Related Destination
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