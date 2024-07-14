<x-app-layout>
    <x-slot name="header">
        All User
    </x-slot>

    <div class="mb-10">
        <div class="relative overflow-x-auto shadow-lg sm:rounded-xl">
            <div class="flex flex-wrap sm:space-y-0 items-center justify-between p-4 bg-gray-200">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" class="block p-2 pl-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-sm text-white uppercase bg-purple-600">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-1/3">Name</th>
                        <th scope="col" class="px-6 py-3 w-1/4">Email</th>
                        <th scope="col" class="px-6 py-3 w-1/4">Joined At</th>
                        <th scope="col" class="px-6 py-3 w-24">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @empty($users->all())
                    <tr>
                        <td colspan="6" class="text-center py-5 text-lg">There is no user</td>
                    </tr>
                @endempty
                    @foreach ($users as $user)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <div class="p-2">
                                        <img src="{{ asset('images/user-default.png') }}" alt="user image" class="mask mask-box rounded-full w-10">
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">{{ $user->name}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 w-1/4">{{ $user->email }}</td>
                        <td class="px-6 py-4 w-1/4">{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('l, j F Y') }}</td>
                        <td class="px-4 py-6 w-24 flex space-x-3 items-center">
                            <a href="#" class="font-medium text-green-400 hover:underline text-lg">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="font-medium text-yellow-400 hover:underline text-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="font-medium text-red-400 hover:underline text-lg">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
