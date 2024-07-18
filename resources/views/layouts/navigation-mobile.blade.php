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
                        <i class="text-tertiary fa-solid fa-house"></i>
                    </x-slot>
                    Dashboard
                </x-responsive-nav-link>
            </li>
            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('admin.dashboard.user') }}" :active="request()->routeIs('admin.dashboard.user')">
                    <x-slot name="icon">
                        <i class="text-tertiary fa-solid fa-users"></i>
                    </x-slot>
                    Users
                </x-responsive-nav-link>
            </li>
            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('admin.dashboard.destination') }}" :active="request()->routeIs('admin.dashboard.destination')">
                    <x-slot name="icon">
                        <i class="text-tertiary fa-solid fa-mountain-sun"></i>
                    </x-slot>
                    Destination
                </x-responsive-nav-link>
            </li>
            <li class="relative px-6 py-3">
                <x-responsive-nav-link href="{{ route('admin.dashboard.visitor') }}" :active="request()->routeIs('admin.dashboard.visitor')">
                    <x-slot name="icon">
                        <i class="text-tertiary fa-solid fa-user-check"></i>
                    </x-slot>
                    Visitor
                </x-responsive-nav-link>
            </li>
        </ul>
    </div>
</aside>
