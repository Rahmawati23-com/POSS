{{-- File: resources/views/filament/user/pages/produk-card-view.blade.php --}}

<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Products Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($produkList as $produk)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md hover:border-primary-300 dark:hover:border-primary-600 transition-all duration-200 overflow-hidden group">
                    {{-- Product Image --}}
                    <div class="aspect-square bg-gray-50 dark:bg-gray-700 relative overflow-hidden">
                        @if($produk->foto)
                            <img 
                                src="{{ Storage::url($produk->foto) }}" 
                                alt="{{ $produk->nama }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
                            >
                        @else
                            <div class="w-full h-full bg-gray-100 dark:bg-gray-600 flex items-center justify-center">
                                <x-heroicon-o-photo class="w-16 h-16 text-gray-400 dark:text-gray-500" />
                            </div>
                        @endif
                        
                        {{-- Category Badge --}}
                        @if($produk->jenisProduk)
                            <div class="absolute top-2 left-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                    {{ $produk->jenisProduk->nama }}
                                </span>
                            </div>
                        @endif
                        
                        {{-- Stock Badge --}}
                        <div class="absolute top-2 right-2">
                            @if($produk->stok > 0)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                    <x-heroicon-s-check-circle class="w-3 h-3 mr-1" />
                                    Tersedia
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                    <x-heroicon-s-x-circle class="w-3 h-3 mr-1" />
                                    Habis
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Product Info --}}
                    <div class="p-4">
                        <div class="mb-2">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white line-clamp-1 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                {{ $produk->nama }}
                            </h3>
                            @if($produk->kode)
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Kode: {{ $produk->kode }}
                                </p>
                            @endif
                        </div>

                        @if($produk->deskripsi)
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-3 line-clamp-2">
                                {{ $produk->deskripsi }}
                            </p>
                        @endif

                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-2xl font-bold text-primary-600 dark:text-primary-400">
                                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                </span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    Stok: {{ $produk->stok }} unit
                                </span>
                            </div>
                        </div>

                        {{-- Additional Info --}}
                        <div class="mt-3 pt-3 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                                <span>Ditambahkan {{ $produk->created_at->diffForHumans() }}</span>
                                @if($produk->updated_at->ne($produk->created_at))
                                    <span>Diperbarui {{ $produk->updated_at->diffForHumans() }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="text-center py-12">
                        <x-heroicon-o-cube class="mx-auto h-16 w-16 text-gray-400 dark:text-gray-500" />
                        <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">
                            @if($searchTerm || $selectedCategory)
                                Produk tidak ditemukan
                            @else
                                Belum ada produk
                            @endif
                        </h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            @if($searchTerm || $selectedCategory)
                                Coba ubah kata kunci pencarian atau filter kategori.
                            @else
                                Belum ada produk yang tersedia saat ini.
                            @endif
                        </p>
                        @if($searchTerm || $selectedCategory)
                            <div class="mt-4">
                                <x-filament::button
                                    wire:click="resetFilters"
                                    color="gray"
                                    size="sm"
                                >
                                    Lihat Semua Produk
                                </x-filament::button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Bottom Summary --}}
        @if($produkList->count() > 0)
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                <div class="text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <span class="font-medium">{{ $produkList->count() }}</span> produk tersedia
                        @if($searchTerm || $selectedCategory)
                            dari total {{ Produk::count() }} produk
                        @endif
                    </p>
                </div>
            </div>
        @endif
    </div>
</x-filament-panels::page>