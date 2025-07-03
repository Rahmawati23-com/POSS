<x-filament-panels::page>
    <div class="space-y-6">
        
        <!-- Create Form Modal/Section -->
        @if($showCreateForm)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Tulis Testimoni Baru
                </h3>
                
                <form wire:submit="createTestimoni" class="space-y-4">
                    {{ $this->form }}
                    
                    <div class="flex gap-3 pt-4">
                        <x-filament::button type="submit" color="primary">
                            Kirim Testimoni
                        </x-filament::button>
                        <x-filament::button type="button" color="gray" wire:click="toggleCreateForm">
                            Batal
                        </x-filament::button>
                    </div>
                </form>
            </div>
        @endif

        <!-- Testimoni List -->
        <div class="space-y-4">
            @if($testimoniList && count($testimoniList) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($testimoniList as $testimoni)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow">
                            <!-- Header -->
                            <div class="flex items-start gap-4 mb-4">
                                <!-- Avatar -->
                                <div class="flex-shrink-0">
                                    @if($testimoni->foto)
                                        <img src="{{ Storage::url($testimoni->foto) }}" 
                                             alt="{{ $testimoni->nama_tokoh }}"
                                             class="w-8 h-8 rounded-full object-cover">
                                    @else
                                        <div class="w-8 h-8 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                            <span class="text-gray-600 dark:text-gray-300 font-medium text-xs">
                                                {{ substr($testimoni->nama_tokoh, 0, 1) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Info -->
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-gray-900 dark:text-white truncate">
                                        {{ $testimoni->nama_tokoh }}
                                    </h4>
                                    <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                                        <span>{{ $this->formatRating($testimoni->rating) }}</span>
                                        <span>•</span>
                                        <span>{{ $testimoni->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Produk -->
                            <div class="mb-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    {{ $testimoni->produk->nama ?? 'Produk tidak ditemukan' }}
                                </span>
                            </div>

                            <!-- Komentar -->
                            <div class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed mb-3">
                                {{ $testimoni->komentar }}
                            </div>

                            <!-- Kategori Tokoh -->
                            @if($testimoni->kategoriTokoh)
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    Kategori: {{ $testimoni->kategoriTokoh->nama }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Stats -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Menampilkan {{ count($testimoniList) }} testimoni
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
                    <div class="max-w-md mx-auto">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-1l-4 4z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                            Belum ada testimoni
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Mulai dengan menulis testimoni pertama untuk produk favorit Anda.
                        </p>
                        <div class="mt-6">
                            <x-filament::button wire:click="toggleCreateForm" color="primary">
                                Tulis Testimoni
                            </x-filament::button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-filament-panels::page>