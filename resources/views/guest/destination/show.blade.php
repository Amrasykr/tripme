@extends('layouts.user')

@section('title', 'Curug Cimarunjung')

@section('content')

    {{-- Hero --}}
    <div class="relative mt-24">
        <div class="px-4 md:px-0 container" >
            <div class="relative">
                <a href="#">
                    <img src="{{ asset('assets/tumbnail_image/'.$destination->main_image) }}" alt="hero" class="w-full h-96 md:h-[46rem] object-cover rounded-2xl">
                    <div class="absolute inset-0 bg-black opacity-45 rounded-2xl z-10"></div>
                    <div class="absolute inset-0 flex flex-col items-start justify-end ml-4 pb-4 md:ml-10 md:pb-10 z-20">
                        <div class="">
                            <h3 class="text-2xl md:text-7xl text-white font-semibold tracking-tight mb-2">
                                {{$destination->name}}
                            </h3>
                            <p class=" md:block text-xm md:text-2xl text-white font-light tracking-tight">
                                {{$destination->description}}
                            </p>
                        </div>
                        <div class="my-1 md:mt-3 md:mb-1 w-2/3 md:w-4/12">
                            <p class="w-full text-xs md:text-sm text-white font-light">
                                {{$destination->capacity_perday}} Capacities Per Day  <span class="mx-1 md:mx-2 font-extralight "><b>·</b></span> {{$available_capacity_today}} Available Capacity Today
                            </p>
                            <p class="w-full text-xs md:text-sm text-white font-light">
                                {{ \Carbon\Carbon::parse($destination->created_at)->diffForHumans() }}  <span class="mx-1 md:mx-2 font-extralight "><b>·</b></span> {{$total_visitors}} Visitors
                            </p>
                            <p class="w-full text-xs md:text-sm text-white font-light">
                                Rp. {{number_format($destination->price)}} / person
                            </p>
                            <a href="{{$destination->address_url}}" class="w-full" target="_blank">
                                <p class="text-xs md:text-sm text-white font-light">
                                    <span class="font-extralight mr-1"><i class="fa-solid fa-location-dot text-white"></i></span> {{$destination->address}}
                                </p>
                            </a>                 
                        </div>
                        <div class="w-4/12 md:w-2/12">
                            <div class="w-full py-1 px-4 md:px-10 bg-tertiary text-xs md:text-sm my-2 text-second_white rounded-2xl text-center">
                               {{$destination->category}}
                            </div>
                        </div>
                        <div class="w-4/12 md:w-2/12 md:mt-2">
                            <div class="w-full">
                                <button onclick="booking.showModal()" class="w-full block py-1 px-4 md:py-3 md:px-8 bg-second_white hover:bg-alternate text-tertiary text-lg md:text-2xl rounded-full transition-all duration-500 ease-in-out text-center">
                                    Book <span><i class="fa-solid fa-arrow-right text-tertiary text-lg md:text-xl ml-2"></i></span>
                                </button>
                                <dialog id="booking" class="modal">
                                    <div class="modal-box">
                                      <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                      </form>
                                      <h3 class="text-lg font-bold">Hello!</h3>
                                      @if (!Auth::check() || Auth::user()->role === 'admin')
                                      <p class="py-4">Ahh, you need to login first before booking</p>
                                      @elseif (!Auth::user()->phone)
                                      <p class="py-4">Ahh, you need to complete your personal data first before booking</p>
                                      @elseif ($available_capacity_today == 0)
                                      <p class="py-4">Ahh sorry, no available reservation today</p>
                                      @else
                                      <p class="py-4">Please, choose the best date for you to trip </p>
                                      <form action="/user/reservation/{{$destination->id}}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('POST')
                                        <div class="w-full">
                                            <div class="w-full mb-4">
                                                <label for="date" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Date</label>
                                                <input id="date" name="date" type="date" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('date') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white">
                                                @error('date')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            
                                            <div class="flex flex-wrap -mx-3 mb-4">
                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="person" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Person</label>
                                                    <input id="person" name="person" type="number" value="{{ old('person') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('person') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:bg-white">
                                                    @error('person')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="duration" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Duration</label>
                                                    <input id="duration" name="duration" type="number" value="{{ old('duration') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('duration') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:bg-white">
                                                    @error('duration')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                            <div class="flex flex-wrap -mx-3 mb-4">
                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="travel" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Travel</label>
                                                    <select id="travel" name="travel_id" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('travel') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:bg-white">
                                                        <option value="" disabled selected>Select Travel</option>
                                                        @foreach($travels as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->description }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('travel')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="distance_in_km" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Distance (in km)</label>
                                                    <input id="distance_in_km" name="distance_in_km" type="number" value="{{ old('distance_in_km') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('distance_in_km') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:bg-white">
                                                    @error('distance_in_km')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                            <div class="w-full mb-4">
                                                <label for="pickup_location" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Pick Up Location</label>
                                                <textarea id="pickup_location" name="pickup_location" rows="4" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('pickup_location') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:bg-white">{{ old('pickup_location') }}</textarea>
                                                @error('pickup_location')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-10 flex justify-end">
                                            <button type="submit" class="bg-secondary text-white px-6 py-2 shadow-lg rounded-md">Submit</button>
                                        </div>
                                        </div>
                                    </form>
                                      @endif    
                                    </div>
                                </dialog>
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
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4  md:gap-8 mt-6 md:mt-8 w-full">
                @foreach ($related_destinations as $related)
                <div class="hover:bg-second_white shadow-xl p-2 md:p-5 rounded-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-1000 ease-in-out">
                    <a href="/destination/{{$related->id}}">
                        <img src="{{ asset('assets/tumbnail_image/'.$related->main_image) }}" alt="hero" class="w-full h-28 md:h-72 object-cover rounded-2xl">
                        <div class="flex justify-between items-center">
                            <div class="py-1 bg-tertiary text-xs md:text-sm text-white w-1/3 my-3 md:my-5 rounded-2xl mx-1">
                                {{$related->category}}
                            </div>
                            <h6 class="text-xs md:text-sm">
                              Rp. {{number_format($related->price) }}
                            </h6>
                        </div>
                        <h3 class="text-start text-tertiary text-sm md:text-3xl font-medium tracking-wide mx-1">
                            {{$related->name}}
                        </h3>
                        <p class="text-start text-tertiary text-xs md:text-xl my-2 mx-1 font-light">
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