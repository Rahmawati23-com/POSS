<x-filament::page>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
        @foreach ($produkList as $jenis)
            <div class="relative w-full aspect-square bg-white shadow rounded-lg overflow-hidden">
                {{-- Gambar --}}
                <img src="{{ asset('storage/' . $jenis->foto) }}"
                     alt="{{ $jenis->nama }}"
                     class="w-full h-full object-cover" />

                {{-- Overlay teks di bawah --}}
                <div class="absolute bottom-0 w-full bg-black/50 text-white text-sm font-semibold px-2 py-1 text-center truncate">
                    {{ $jenis->nama }}
                </div>
            </div>
        @endforeach
    </div>
</x-filament::page>
