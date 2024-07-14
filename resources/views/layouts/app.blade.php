<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('TripMe', 'Tripme') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" type="image/png" href={{ asset('images/logo-head.png') }} >
        <!-- Scripts -->
        <script src="{{ asset('js/init-alpine.js') }}"></script>

        {{-- tinymce --}}
        <script src="https://cdn.tiny.cloud/1/2oib8af25tz6ikzr6fqfks0mrncjqj8ybbl576d7emupo4nk/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
              selector: 'textarea',
              plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
              toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
          </script>

        <!-- SweetAlert -->
        <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
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
                <div class="flex items-center my-6 space-x-5">
                    <button onclick="window.history.back()" class="bg-purple-600 w-10 h-12 rounded-l-lg flex justify-center items-center">
                        <i class="fa-solid fa-arrow-left text-xl text-white"></i>
                    </button>
                    @if (isset($header))
                        <h2 class="text-2xl font-semibold text-gray-700">
                            {{ $header }}
                        </h2>
                    @endif
                </div>                

                {{ $slot }}
            </div>
        </main>
    </div>
</div>

@stack('scripts')

<script>
    // Function to display alerts
    function showAlert(type, message) {
        alert(type + ': ' + message);
    }

    // Check for success message
    @if(session('success'))
        showAlert('Success', '{{ session('success') }}');
    @endif

    // Check for error message
    @if(session('error'))
        showAlert('Error', '{{ session('error') }}');
    @endif
</script>


</body>
</html>
