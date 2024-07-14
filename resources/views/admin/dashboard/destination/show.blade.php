<x-app-layout>
    <x-slot name="header">
        {{$destination->name}}
    </x-slot>
    <div class="mb-10 md:flex md:space-x-5">
        <div class="w-full md:w-1/3 bg-white">
            <div class="tumbnail">
                <img src="{{ asset('assets/tumbnail_image/'. $destination->main_image) }}" alt="destination image" class="w-full h-72 rounded-lg object-cover object-center">
            </div>
            <div class="flex space-x-5 mt-4">
                <div class="w-1/2">
                    <img src="{{ asset('assets/destination_image/'. $destination->image_1) }}" alt="destination image" class="w-full h-32 rounded-lg object-cover object-center">
                </div>
                <div class="w-1/2 md:h-32 ">
                    <img src="{{ asset('assets/destination_image/'. $destination->image_2) }}" alt="destination image" class="w-full h-32 rounded-lg object-cover object-center">

                </div>
            </div>
            <div class="flex space-x-5 mt-4">
                <div class="w-1/2 md:h-32 ">
                    <img src="{{ asset('assets/destination_image/'. $destination->image_3) }}" alt="destination image" class="w-full h-32 rounded-lg object-cover object-center">

                </div>
                <div class="w-1/2 md:h-32 ">
                    <img src="{{ asset('assets/destination_image/'. $destination->image_4) }}" alt="destination image" class="w-full h-32 rounded-lg object-cover object-center">
                </div>
            </div>
        </div>
        <div class="w-full md:w-2/3 bg-white mt-3 md:mt-0">
            <form class="w-full bg-white p-8 shadow-xl rounded-lg" enctype="multipart/form-data" method="POST" action="/admin/dashboard/destination/store">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Destination Name</label>
                        <input id="name" name="name" type="text" value="{{$destination->name}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border-none @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight  focus:outline-none focus:bg-white" type="file" disabled>

                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="category" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Category</label>
                        <input id="name" name="name" type="text" value="{{$destination->category}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border-none @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight  focus:outline-none focus:bg-white" type="file" disabled>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label for="address" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Address</label>
                        <input id="address" name="address" type="text" value="{{$destination->address}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border-none @error('address') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="address_url" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Address URL</label>
                        <input id="address_url" name="address_url" type="text" value="{{$destination->address_url}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border-none @error('address_url') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        @error('address_url')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label for="description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Description</label>
                        <input id="description" name="description" type="text" value="{{$destination->description}}"class="appearance-none block w-full bg-gray-200 text-gray-700 border-none @error('description') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        @error('description')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-2 flex justify-end">
                    <a href="/admin/dashboard/destination/{{$destination->id}}/edit" class="bg-yellow-500 text-white px-6 py-2 shadow-lg rounded-md">Edit</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
