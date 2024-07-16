<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('TripMe', 'Tripme') }} :: @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-head.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Scripts -->
    <script src="{{ asset('js/init-alpine.js') }}"></script>
</head>
<body>
    @include('layouts.user-navigation')

    <div class="flex items-center min-h-screen p-6 bg-gray-50">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl">
            @yield('content')
        </div>
    </div>

    @yield('script')
</body>
</html>
