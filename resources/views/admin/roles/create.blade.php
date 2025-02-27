<x-layouts.app>
    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-zinc-900 sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <!-- Header Section -->
                <div class="px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Create New Role</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Add a new role to the system
                            </p>
                        </div>
                        <a href="{{ route('roles.index') }}" 
                           class="inline-flex items-center gap-x-2 rounded-lg bg-gray-100 px-4 py-2.5 text-sm font-semibold text-gray-900 hover:bg-gray-200 dark:bg-zinc-800 dark:text-white dark:hover:bg-zinc-700">
                            <svg class="h-5 w-5 -ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z" clip-rule="evenodd" />
                            </svg>
                            Back to Roles
                        </a>
                    </div>
                </div>

                <!-- Form Section -->
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    
                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="p-4 bg-red-50 border-l-4 border-red-500 dark:bg-red-400/10 dark:border-red-400">
                            <div class="flex items-center gap-2 text-red-700 dark:text-red-400">
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-sm font-medium">Please fix the following errors:</p>
                            </div>
                            <ul class="mt-2 ml-5 list-disc text-sm text-red-700 dark:text-red-400">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="space-y-6 p-8">
                        <!-- Role Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Role Name</label>
                            <div class="mt-1">
                                <input type="text" 
                                       name="name" 
                                       id="name"
                                       value="{{ old('name') }}" 
                                       class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 dark:text-white dark:bg-zinc-800 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description (Optional)</label>
                            <div class="mt-1">
                                <textarea
                                       name="description" 
                                       id="description"
                                       rows="3"
                                       class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 dark:text-white dark:bg-zinc-800 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Permissions Section -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-200">Permissions</h3>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" id="select-all" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-zinc-800 dark:border-zinc-700">
                                    <span class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">Select All</span>
                                </label>
                            </div>
                            
                            <div class="mt-2 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                                @foreach($permissions as $group => $items)
                                    <div class="border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                                        <div class="bg-gray-50 dark:bg-zinc-800 px-4 py-3">
                                            <h4 class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                                {{ $group }}
                                            </h4>
                                        </div>
                                        <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                                            @foreach(is_array($items) ? $items : [$items] as $permission)
                                                <label class="flex items-center space-x-3 cursor-pointer">
                                                    <input type="checkbox" name="permissions[]" value="{{ $permission }}" 
                                                        {{ in_array($permission, old('permissions', [])) ? 'checked' : '' }}
                                                        class="permission-checkbox w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-zinc-800 dark:border-zinc-700">
                                                    <span class="text-sm text-gray-700 dark:text-gray-300">
                                                        {{ ucfirst(str_replace('_', ' ', $permission)) }}
                                                    </span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('permissions')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="px-8 py-6 bg-gray-50 dark:bg-zinc-800/50 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="inline-flex items-center gap-x-2 rounded-md bg-green-50 px-3 py-2 text-sm font-semibold text-green-700 ring-1 ring-inset ring-green-600/10 hover:bg-green-100 dark:bg-green-400/10 dark:text-green-400 dark:ring-green-400/20 dark:hover:bg-green-400/20">
                                <svg class="-ml-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                </svg>
                                Create Role
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all');
            const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

            selectAllCheckbox.addEventListener('change', function() {
                permissionCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            // Update select all checkbox based on individual checkbox states
            function updateSelectAllCheckbox() {
                let allChecked = true;
                permissionCheckboxes.forEach(checkbox => {
                    if (!checkbox.checked) {
                        allChecked = false;
                    }
                });
                selectAllCheckbox.checked = allChecked;
            }

            permissionCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSelectAllCheckbox);
            });
        });
    </script>
</x-layouts.app>
