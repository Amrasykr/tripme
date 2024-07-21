@extends('layouts.app')

@section('title', 'Create Destination')
    
@section('header')
    <h2 class="text-4xl font-medium text-secondary">
        Create Travel
    </h2>
@endsection


    
@section('content')
    
<div class="mb-10">
    <form class="w-full bg-white p-8 shadow-xl rounded-lg" enctype="multipart/form-data" method="POST" action="/admin/dashboard/travel/store">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="name" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Travel Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight  focus:bg-white" >
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="price" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Price</label>
                <input id="price" name="price" type="number" value="{{ old('price') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('price') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight  focus:bg-white">
                @error('price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="price_per_km" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Price Per KM</label>
                <input id="price_per_km" name="price_per_km" type="number" value="{{ old('price_per_km') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('price_per_km') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight  focus:bg-white" >
                @error('price_per_km')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="description" class="block uppercase tracking-wide text-tertiary text-xs font-bold mb-2">Description</label>
                <input id="description" name="description" type="text" value="{{ old('description') }}" class="appearance-none block w-full bg-second_white text-tertiary border-none @error('description') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight  focus:bg-white">
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-2 flex justify-end">
            <button type="submit" class="bg-secondary text-white px-6 py-2 shadow-lg rounded-md">Submit</button>
        </div>
    </form>
</div>

@endsection
    
@section('script')
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
@endsection


    


