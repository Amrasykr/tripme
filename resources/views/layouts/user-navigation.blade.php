<nav x-data="{ open: false }" class="fixed top-0 z-40 flex flex-wrap items-center justify-between w-full px-4 py-5 shadow-md bg-second_white/50 backdrop-blur-md md:py-4 md:px-4 lg:px-20">
    <!-- Left nav -->
    <div class="flex items-center">
        <a href="/">
            <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-28">
        </a>
    </div>
    <!-- End left nav -->
  
    <!-- Toggle button -->
    <div class="block text-gray-600 cursor-pointer lg:hidden">
        <button @click="open = !open" class="w-6 h-6 text-lg">
            <svg x-show="!open" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                <path d="M7.94977 11.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M7.94977 23.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M7.94977 35.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
  
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    <!-- End toggle button -->
  
    <!-- Toggle menu -->
    <div x-show="open" class="relative w-full overflow-hidden transition-all duration-700 lg:hidden">
        <div class="flex flex-col mb-3 mt-7 space-y-2 text-lg text-gray-900">
            <a href="/" class="text-secondary hover:text-tertiary transition-all duration-300 ease-in-out">Home</a>
            <hr>
            <a href="/destination" class="text-secondary hover:text-tertiary transition-all duration-300 ease-in-out">Destination</a>
            <hr>
            <a href="/about" class="text-secondary hover:text-tertiary transition-all duration-300 ease-in-out">About</a>
            <hr>
            @if (Auth::user())
            <a href="/user/dashboard" class="text-secondary hover:text-tertiary transition-all duration-300 ease-in-out">Dashboard</a>
            <hr>
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="text-secondary hover:text-tertiary transition-all duration-300 ease-in-out">Logout</a>
            </form>
            @endif
        </div>
        <div>
            @if (!Auth::user())
            <a href="/register" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium bg-secondary hover:bg-tertiary text-white  transition-all duration-300 ease-in-out">
                Sign up
            </a>
            <p class="mt-6 text-center text-base font-medium">
                <a href="/login" class=" text-secondary hover:text-tertiary transition-all duration-300 ease-in-out">Sign in</a>
            </p>
            @endif
        </div>

    </div>
    <!-- End toggle menu -->
  
    <!-- Show Menu lg -->
    @if (Auth::user())
        <div class="hidden w-full lg:flex lg:items-center lg:w-auto">
            <div class="flex-1 pt-6 justify-center text-lg lg:pt-0 lg:flex space-x-10 mr-10">
                <a href="/" class="text-base font-medium  inline-block py-2 no-underline text-secondary hover:text-tertiary  transition-all duration-300 ease-in-out">Home</a>
                <a href="/destination" class="text-base font-medium inline-block py-2 no-underline text-secondary hover:text-tertiary  transition-all duration-300 ease-in-out">Destination</a>
                <a href="/about" class="inline-block text-base font-medium py-2 no-underline text-secondary hover:text-tertiary  transition-all duration-300 ease-in-out">About</a>
            </div>
        </div>
    @else
    <div class="hidden w-full lg:flex lg:items-center lg:w-auto ">
        <div class="flex-1 pt-6 justify-center text-lg lg:pt-0 lg:flex space-x-10 ml-12">
            <a href="/" class="text-base font-medium  inline-block py-2 no-underline text-secondary hover:text-tertiary  transition-all duration-300 ease-in-out">Home</a>
            <a href="/destination" class="text-base font-medium inline-block py-2 no-underline text-secondary hover:text-tertiary transition-all duration-300 ease-in-out">Destination</a>
            <a href="/about" class="inline-block text-base font-medium py-2 no-underline text-secondary hover:text-tertiary  transition-all duration-300 ease-in-out">About</a>
        </div>
    </div>
    @endif


    <!-- End show Menu lg -->
  
    <!-- Right nav -->
    @if (Auth::user())
    <div class="hidden lg:flex items-center relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center  text-gray-700 font-semibold rounded focus:outline-none">
            <span class="mr-1">
                @if (Auth::user()->image)
                <img src="{{ asset('assets/user_image/' . Auth::user()->image) }}" alt="user" class="w-10 rounded-full">
                @else
                <img src="{{ asset('images/user-default.png') }}" alt="user" class="w-10 rounded-full">
                @endif
            </span>
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" style="margin-top:3px">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
        </button>
        <ul x-show="open" @click.away="open = false" class="bg-white text-gray-700 rounded shadow-lg absolute py-2 top-16 right-0" style="min-width:20rem">
            <li>
                @if (Auth::user()->role ==='user')
                <a href="/user/dashboard" class="block hover:bg-second_white text-tertiary whitespace-no-wrap py-2 px-4 transition-all duration-500 ease-in-out">Dashboard</a>
                @else
                <a href="/admin/dashboard" class="block hover:bg-second_white text-tertiary whitespace-no-wrap py-2 px-4 transition-all duration-500 ease-in-out">Dashboard</a>
                @endif
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}" class="block hover:bg-second_white text-tertiary whitespace-no-wrap py-2 px-4">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </div>
    @else
    <div class="hidden w-full lg:flex lg:items-center lg:w-auto">
        <div class="items-center flex-1 pt-6 justify-center text-lg lg:pt-0 list-reset lg:flex">
            <a href="/login" class="whitespace-nowrap text-base font-medium text-secondary hover:text-tertiary transition-all duration-300 ease-in-out">Sign in</a>
            <a href="/register" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-6 py-2 border border-transparent rounded-full shadow-sm text-base font-medium text-white bg-secondary hover:bg-tertiary transition-all duration-700 ease-in-out">Sign up</a>
        </div>
    </div>
    @endif
    <!-- End right nav -->
</nav>