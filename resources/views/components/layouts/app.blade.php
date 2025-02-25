<x-layouts.app.sidebar>
    <flux:main class="flex flex-col min-h-screen">
        <!-- Flash Messages -->
        @if (session('success'))
            <div 
                x-data="{ show: true }"
                x-show="show"
                x-init="() => {
                    setTimeout(() => {
                        show = false
                    }, 3000)
                }"
                x-transition:enter="transform ease-out duration-300 transition"
                x-transition:enter-start="translate-y-2 opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0 transform translate-y-2"
                class="fixed inset-x-0 top-0 z-50"
            >
                <div class="bg-green-500 shadow-lg dark:bg-green-700">
                    <div class="mx-auto max-w-7xl px-4 py-3 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-x-3">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-white">
                                    {{ session('success') }}
                                </p>
                            </div>
                            <button 
                                @click="show = false"
                                type="button"
                                class="rounded-md p-1.5 text-white hover:bg-green-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 dark:text-white dark:hover:bg-green-800 dark:hover:text-white"
                            >
                                <span class="sr-only">Dismiss</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        <main class="flex-grow">
            {{ $slot }}
        </main>
        
        <x-layouts.app.footer />
    </flux:main>
</x-layouts.app.sidebar>