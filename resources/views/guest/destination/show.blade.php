@extends('layouts.user')

@section('title', 'Curug Cimarunjung')

@section('content')

    {{-- Hero --}}
    <div class="relative mt-24">
        <div class="px-3 md:px-14" data-aos="fade-up">
            <div class="relative">
                <a href="#">
                    <img src="{{ asset('assets/tumbnail_image/'.$destination->main_image) }}" alt="hero" class="w-full md:h-[43rem] object-cover rounded-2xl">
                    <div class="absolute inset-0 bg-black opacity-45 rounded-2xl z-10"></div>
                    <div class="absolute inset-0 flex flex-col items-start justify-end ml-4 pb-4 md:ml-10 md:pb-10  z-20 ">
                        <div class="w-1/2">
                            <h3 class="text-2xl md:text-7xl text-white font-bold tracking-wider uppercase ">
                                {{$destination->name}}
                            </h3>
                            <p class="text-sm md:text-3xl text-white font-light">
                                {{$destination->description}}
                            </p>
                        </div>
                        <div class="my-1 md:mt-3 md:mb-1 w-2/3 md:w-4/12">
                            <p class="w-fulltext-xs md:text-sm text-white font-light">
                                {{ \Carbon\Carbon::parse($destination->created_at)->diffForHumans() }} <span class="mx-1 md:mx-2 font-extralight "><b>·</b></span> 24 Pengunjung
                            </p>
                            <a href="{{$destination->address_url}}" class="w-full" target="_blank">
                                <p class="text-xs md:text-sm text-white font-light">
                                    <span class="font-extralight"><i class="fa-solid fa-location-dot text-white"></i></span> {{$destination->address}}
                                </p>
                            </a>                 
                        </div>
                        <div class="w-1/4 md:w-2/12">
                            <div class="w-full py-1 px-4 md:px-10 bg-yellow-700 text-xs md:text-sm my-2 text-white rounded-2xl text-center">
                                {{$destination->category}}
                            </div>
                            <button class="w-full mt-2 py-1 px-2 md:py-2 md:px-10 font-medium  bg-purple-700 hover:bg-white text-white hover:text-purple-700 text-lg md:text-2xl  rounded-lg transition-all duration-500 ease-in-out">
                                Book <span><i class="fa-solid fa-arrow-right" class="text-white text-lg md:text-3xl"></i></span>
                            </button>
                        </div>
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
                    {!! $destination->content !!}
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
                    <img src="{{ asset('assets/destination_image/'.$destination->image_1) }}" alt="hero" class="w-full h-60 object-cover rounded-2xl">
                </div>
                <div class="w-52 md:w-96">
                    <img src="{{ asset('assets/destination_image/'.$destination->image_2) }}" alt="hero" class="w-full h-60 object-cover rounded-2xl">
                </div>
                <div class="w-52 md:w-96">
                    <img src="{{ asset('assets/destination_image/'.$destination->image_3) }}" alt="hero" class="w-full h-60 object-cover rounded-2xl">
                </div>
                <div class="w-52 md:w-96">
                    <img src="{{ asset('assets/destination_image/'.$destination->image_4) }}" alt="hero" class="w-full h-60 object-cover rounded-2xl">
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
                @foreach ($related_destinations as $related)
                <div class="w-full md:w-1/3  bg-white hover:bg-purple-100  shadow-xl p-5 rounded-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-1000 ease-in-out"  >
                    <a href="/destination/{{$related->id}}">
                        <img src="{{ asset('assets/tumbnail_image/'.$related->main_image) }}" alt="hero" class="w-full  object-cover rounded-2xl">
                        <div class="py-1 bg-purple-700 text-sm  text-white w-1/3 my-3 rounded-2xl mx-1">
                            {{$related->category}}
                        </div>
                        <h3 class="text-start text-3xl font-medium tracking-wide mx-1">
                            {{$related->name}}
                        </h3>
                        <p class="text-start text-xl my-2 mx-1 font-light "> 
                            {{$related->description}}
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