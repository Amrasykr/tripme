<x-app-layout>
    <x-slot name="header">
        Create Destination
    </x-slot>

    <div class="mb-10">
        <form class="w-full bg-white p-8 shadow-xl rounded-lg" enctype="multipart/form-data" method="POST" action="/admin/dashboard/destination/store">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Destination Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}"
                           class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="category" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Category</label>
                    <select id="category" name="category" class="block appearance-none w-full bg-gray-200 border @error('category') border-red-500 @enderror text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white">
                        <option value="" selected disabled>Select a category</option>
                        <option value="beach" {{ old('category') == 'beach' ? 'selected' : '' }}>Beach</option>
                        <option value="mountain" {{ old('category') == 'mountain' ? 'selected' : '' }}>Mountain</option>
                        <option value="city" {{ old('category') == 'city' ? 'selected' : '' }}>City</option>
                        <option value="museum" {{ old('category') == 'museum' ? 'selected' : '' }}>Museum</option>
                        <option value="lake" {{ old('category') == 'lake' ? 'selected' : '' }}>Lake</option>
                        <option value="river" {{ old('category') == 'river' ? 'selected' : '' }}>River</option>
                        <option value="forest" {{ old('category') == 'forest' ? 'selected' : '' }}>Forest</option>
                        <option value="desert" {{ old('category') == 'desert' ? 'selected' : '' }}>Desert</option>
                        <option value="temple" {{ old('category') == 'temple' ? 'selected' : '' }}>Temple</option>
                        <option value="palace" {{ old('category') == 'palace' ? 'selected' : '' }}>Palace</option>
                        <option value="castle" {{ old('category') == 'castle' ? 'selected' : '' }}>Castle</option>
                        <option value="aquarium" {{ old('category') == 'aquarium' ? 'selected' : '' }}>Aquarium</option>
                        <option value="theme park" {{ old('category') == 'theme park' ? 'selected' : '' }}>Theme Park</option>
                        <option value="national park" {{ old('category') == 'national park' ? 'selected' : '' }}>National Park</option>
                        <option value="waterfall" {{ old('category') == 'waterfall' ? 'selected' : '' }}>Waterfall</option>
                        <option value="cave" {{ old('category') == 'cave' ? 'selected' : '' }}>Cave</option>
                        <option value="island" {{ old('category') == 'island' ? 'selected' : '' }}>Island</option>
                        <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>

                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="address" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Address</label>
                    <input id="address" name="address" type="text" value="{{ old('address') }}"
                           class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('address') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    @error('address')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="address_url" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Address URL</label>
                    <input id="address_url" name="address_url" type="text" value="{{ old('address_url') }}"
                           class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('address_url') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    @error('address_url')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Description</label>
                    <input id="description" name="description" type="text" value="{{ old('description') }}"
                           class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('description') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex -mx-3 mb-2">
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image_1">
                        Image 1
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('image_1') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="image_1" name="image_1" type="file">
                    @error('image_1')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image_2">
                        Image 2
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('image_2') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="image_2" name="image_2" type="file">
                    @error('image_2')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image_3">
                        Image 3
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('image_3') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="image_3" name="image_3" type="file">
                    @error('image_3')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image_4">
                        Image 4
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('image_4') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="image_4" name="image_4" type="file">
                    @error('image_4')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="content" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Content</label>
                    <textarea id="content" name="content"
                              class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('content') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-2 flex justify-end">
                <button type="submit" class="bg-purple-600 text-white px-6 py-2 shadow-lg rounded-md">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
