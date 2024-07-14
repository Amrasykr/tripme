<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('TripMe', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Scripts -->
        <script src="{{ asset('js/init-alpine.js') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
<body>
<div
    class="flex h-screen bg-gray-50"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    <!-- Desktop sidebar -->
    @include('layouts.navigation')
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    @include('layouts.navigation-mobile')
    <div class="flex flex-col flex-1 w-full">
        @include('layouts.top-menu')
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                @if (isset($header))
                    <h2 class="my-6 text-2xl font-semibold text-gray-700">
                        {{ $header }}
                    </h2>
                @endif

                {{ $slot }}
            </div>
        </main>
    </div>
</div>
</body>
</html>
