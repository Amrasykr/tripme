@extends('layouts.user')

@section('title', 'Curug Cimarunjung')

@section('content')

    {{-- Hero --}}
    <div class="relative mt-24" data-aos="fade-up">
        <div class="px-4 md:px-0 container" >
            <div class="relative">
                <a href="#">
                    <img src="{{ asset('assets/tumbnail_image/'.$destination->main_image) }}" alt="hero" class="w-full md:h-[43rem] object-cover rounded-2xl">
                    <div class="absolute inset-0 bg-black opacity-45 rounded-2xl z-10"></div>
                    <div class="absolute inset-0 flex flex-col items-start justify-end ml-4 pb-4 md:ml-10 md:pb-10 z-20">
                        <div class="w-3/5 md:1/3">
                            <h3 class="text-2xl md:text-7xl text-white font-semibold tracking-tight mb-2">
                                {{$destination->name}}
                            </h3>
                            <p class=" md:block text-xm md:text-2xl text-white font-light tracking-tight">
                                {{$destination->description}}
                            </p>
                        </div>
                        <div class="my-1 md:mt-3 md:mb-1 w-2/3 md:w-4/12">
                            <p class="w-full text-xs md:text-sm text-white font-light">
                                {{ \Carbon\Carbon::parse($destination->created_at)->diffForHumans() }}  <span class="mx-1 md:mx-2 font-extralight "><b>·</b></span> 24 Pengunjung
                            </p>
                            <a href="{{$destination->address_url}}" class="w-full" target="_blank">
                                <p class="text-xs md:text-sm text-white font-light">
                                    <span class="font-extralight"><i class="fa-solid fa-location-dot text-white"></i></span> {{$destination->address}}
                                </p>
                            </a>                 
                        </div>
                        <div class="w-4/12 md:w-2/12">
                            <div class="w-full py-1 px-4 md:px-10 bg-tertiary text-xs md:text-sm my-2 text-second_white rounded-2xl text-center">
                                Lorem, ipsum.
                            </div>
                        </div>
                        <div class="w-4/12 md:w-2/12 md:mt-2">
                            <div class="w-full">
                                <a href="{{ url('/#top') }}" class="w-full block py-1 px-4 md:py-3 md:px-8 bg-second_white hover:bg-alternate text-tertiary text-lg md:text-2xl rounded-full transition-all duration-500 ease-in-out text-center">
                                    Book <span><i class="fa-solid fa-arrow-right text-tertiary text-lg md:text-xl ml-2"></i></span>
                                </a>
                            </div>
                        </div>                        
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- content --}}
    <div class="mt-5 md:mt-10 container px-6 md:px-0">
        <div class="flex justify-between md:space-x-8">
            <div class="w-full md:px-40">
                <p class="text-lg text-gray-900 ">
                    {!! $destination->content !!}
                </p>
            </div>
        </div>
    </div>

    {{-- Gallery --}}
    <div class="my-4 md:mb-20 md:mt-10">
        <div class="flex flex-col items-center text-center">
            <div class="text-3xl md:text-7xl font-light text-gray-900">
                Gallery
            </div>
            <div class="grid grid-cols-2  gap-4 md:gap-10 mt-10 mx-10">
                <div class="w-52 md:w-96">
                    <img src="{{ asset('assets/destination_image/'.$destination->image_1) }}" alt="hero" class="w-full h-40 md:h-72 object-cover rounded-2xl">
                </div>
                <div class="w-52 md:w-96">
                    <img src="{{ asset('assets/destination_image/'.$destination->image_2) }}" alt="hero" class="w-full h-40 md:h-72 object-cover rounded-2xl">
                </div>
                @if ($destination->image_3 && !$destination->image_4)
                    <div class="col-span-2  w-full">
                        <img src="{{ asset('assets/destination_image/'.$destination->image_3) }}" alt="destination image 3" class="w-full h-40 md:h-72 object-cover rounded-2xl">
                    </div>
                @elseif ($destination->image_4 && !$destination->image_3)
                    <div class="col-span-2  w-full">
                        <img src="{{ asset('assets/destination_image/'.$destination->image_4) }}" alt="destination image 4" class="w-full h-40 md:h-72 object-cover rounded-2xl">
                    </div>
                @elseif ($destination->image_3 && $destination->image_4)
                    <div class="w-52 md:w-96">
                        <img src="{{ asset('assets/destination_image/'.$destination->image_3) }}" alt="destination image 3" class="w-full h-40 md:h-72 object-cover rounded-2xl">
                    </div>
                    <div class="w-52 md:w-96">
                        <img src="{{ asset('assets/destination_image/'.$destination->image_4) }}" alt="destination image 4" class="w-full h-40 md:h-72 object-cover rounded-2xl">
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- related destination --}}
    @if($related_destinations->isNotEmpty())
    <div class="my-10 md:my-20 container px-4 md:px-0">
        <div class="flex flex-col items-center text-center">
            <div class="text-3xl md:text-7xl font-light text-gray-900">
                Related Destinations
            </div>

            <div class="md:flex justify-center space-y-8 md:space-y-0 space-x-0 md:space-x-8 mt-6 md:mt-8 w-full">
                @foreach ($related_destinations as $related)
                <div class="w-full md:w-1/3 bg-second_white hover:bg-alternate shadow-xl p-5 rounded-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-1000 ease-in-out">
                    <a href="/destination/{{$related->id}}">
                        <img src="{{ asset('assets/tumbnail_image/'.$related->main_image) }}" alt="hero" class="w-full h-72 object-cover rounded-2xl">
                        <div class="py-1 bg-tertiary text-sm text-white w-1/3 my-3 rounded-2xl mx-1">
                            {{$related->category}}
                        </div>
                        <h3 class="text-start text-tertiary text-3xl font-medium tracking-wide mx-1">
                            {{$related->name}}
                        </h3>
                        <p class="text-start text-tertiary text-xl my-2 mx-1 font-light">
                            {{$related->description}}
                        </p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif


@endsection

@section('script')
    <script>
        // Scroll Animation
        AOS.init({
            duration: 2500
        });

    </script>
@endsection   