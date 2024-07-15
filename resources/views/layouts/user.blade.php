<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('TripMe', 'Tripme') }}</title>
        <link rel="icon" type="image/png" href={{ asset('images/logo-head.png') }} >

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Scripts -->
        <script src="{{ asset('js/init-alpine.js') }}"></script>
</head>
<body class="bg-slate-50">        
    <!-- Desktop sidebar -->
    @include('layouts.user-navigation')

    {{ $slot }}

    @include('layouts.user-footer')

    {{-- typewriter --}}
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>

        // Type Animation
        var typedStatus = new Typed(".auto-type-status", {
            strings : ["Hidden Gems in", "the Beauty of", "Breathtaking Landscapes of", "Vibrant Cultures"],
            typeSpeed : 100,
            backSpeed : 80,
            
            loop : true
        })

        
        // Scroll Animation
        AOS.init({
            duration: 2500
        });

    </script>
</body>
</html>
