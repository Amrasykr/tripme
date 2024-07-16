<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('TripMe', 'TripMe') }} :: @yield('title')</title>
    <link rel="icon" type="image/png" href={{ asset('images/logo-head.png') }}>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    @notifyCss
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Scripts -->
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <style>
        .notification-container {
            position: absolute;
            z-index: 1000; 
        }
    </style>
</head>

<body class="bg-slate-50">        
    <!-- Desktop sidebar -->
    @include('layouts.user-navigation')

    <main>
        {{-- Main Content --}}
        @yield('content')
    </main>

    @include('layouts.user-footer')

    {{-- typewriter --}}
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <div class="notification-container">
        <x-notify::notify />
    </div>
    @yield('script')
    @notifyJs

</body>
</html>
