<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('TripMe', 'Tripme') }} :: @yield('title', 'Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('images/logo-head.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/init-alpine.js') }}"></script>

    <!-- tinymce -->
    <script src="https://cdn.tiny.cloud/1/2oib8af25tz6ikzr6fqfks0mrncjqj8ybbl576d7emupo4nk/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- SweetAlert -->
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('layouts.navigation')
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        @include('layouts.navigation-mobile')
        <div class="flex flex-col flex-1 w-full">
            @include('layouts.top-menu')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <div class="flex items-center my-6 space-x-5">
                        <button onclick="window.history.back()" class="bg-purple-600 w-10 h-12 rounded-l-lg flex justify-center items-center">
                            <i class="fa-solid fa-arrow-left text-xl text-white"></i>
                        </button>
                        @yield('header')
                    </div>                

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('script')
</body>
</html>
