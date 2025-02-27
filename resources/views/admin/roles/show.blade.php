<x-layouts.app>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-zinc-900 sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <!-- Header Section -->
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Role Details: {{ $role->name }}</h1>
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('roles.index') }}" class="inline-flex items-center gap-x-2 rounded-md bg-gray-50 px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-100 dark:bg-zinc-800 dark:text-white dark:ring-zinc-700 dark:hover:bg-zinc-700">
                                <svg class="-ml-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z" clip-rule="evenodd" />
                                </svg>
                                Back to Roles
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Role Info Card -->
                        <div class="col-span-1 bg-white dark:bg-zinc-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow">
                            <div class="p-5 border-b border-gray-200 dark:border-gray-700">
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Role Information</h2>
                            </div>
                            <div class="p-5 space-y-4">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</h3>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $role->name }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</h3>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $role->description }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Created</h3>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $role->created_at->format('M d, Y H:i') }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Users Count</h3>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $role->users->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Permissions Card -->
                        <div class="col-span-2 bg-white dark:bg-zinc-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow">
                            <div class="p-5 border-b border-gray-200 dark:border-gray-700">
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Permissions</h2>
                            </div>
                            <div class="p-5">
                                @if(count($role->permissions))
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                        @foreach($role->permissions as $permission)
                                            <div class="bg-blue-50 dark:bg-blue-900/20 px-3 py-2 rounded-md text-sm text-blue-700 dark:text-blue-400 ring-1 ring-inset ring-blue-700/10 dark:ring-blue-400/30">
                                                {{ $permission }}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-sm text-gray-500 dark:text-gray-400">No permissions assigned to this role.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Users Card -->
                        <div class="col-span-3 bg-white dark:bg-zinc-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow">
                            <div class="p-5 border-b border-gray-200 dark:border-gray-700">
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Users with this Role</h2>
                            </div>
                            <div class="p-5">
                                @if($role->users->count())
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead class="bg-gray-50 dark:bg-zinc-800">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Joined</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white dark:bg-zinc-900 divide-y divide-gray-200 dark:divide-gray-700">
                                                @foreach($role->users as $user)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $user->created_at->format('M d, Y') }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            <a href="{{ route('users.show', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600">View</a>                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-sm text-gray-500 dark:text-gray-400">No users assigned to this role.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
