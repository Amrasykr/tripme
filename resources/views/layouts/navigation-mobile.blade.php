<aside
    class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white md:hidden"
    x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20"
    @keydown.escape="closeSideMenu"
>
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800" href="{{ route('admin.dashboard') }}">
            <!-- Logo or Brand Name -->
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </x-slot>
                    Dashboard
                </x-responsive-nav-link>
            </li>
            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('admin.dashboard.user') }}" :active="request()->routeIs('admin.dashboard.user')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8 4 4 0 010-8zm0 10.292c-2.5 0-5.5 1.334-5.5 4v1h11v-1c0-2.666-3-4-5.5-4z"></path>
                        </svg>
                    </x-slot>
                    Users
                </x-responsive-nav-link>
            </li>
        </ul>
    </div>
</aside>
