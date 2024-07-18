<aside class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0">
    <div class="text-gray-500">
        <a class=" text-lg font-bold text-gray-800 flex justify-center" href="/">
            <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-32 my-8">
        </a>

        <ul>
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                    <x-slot name="icon">
                        <i class="text-tertiary fa-solid fa-house"></i>
                    </x-slot>
                   Dashboard
                </x-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('admin.dashboard.user') }}" :active="request()->routeIs('admin.dashboard.user')">
                    <x-slot name="icon">
                        <i class="text-tertiary fa-solid fa-users"></i>
                    </x-slot>
                    User
                </x-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('admin.dashboard.destination') }}" :active="request()->routeIs('admin.dashboard.destination')">
                    <x-slot name="icon">
                        <i class="text-tertiary fa-solid fa-mountain-sun"></i>
                    </x-slot>
                    Destinations
                </x-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('admin.dashboard.visitor') }}" :active="request()->routeIs('admin.dashboard.visitor')">
                    <x-slot name="icon">
                        <i class="text-tertiary fa-solid fa-user-check"></i>
                    </x-slot>
                    Visitor
                </x-nav-link>
            </li>

        </ul>
    </div>
</aside>
