<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('TripMe', 'Tripme') }} :: @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-head.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />

    @notifyCss
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
         
    <style>
        .notification-container {
            position: absolute;
            z-index: 1000; 
        }
    </style>
</head>
<body>
    <!-- Desktop sidebar -->
    @include('layouts.user-navigation')

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.user-footer')

    <!-- Script -->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="notification-container">
        <x-notify::notify />
    </div>
    @yield('script')
    @notifyJs
</body>
</html>
