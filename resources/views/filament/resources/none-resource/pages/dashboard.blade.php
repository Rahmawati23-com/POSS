<x-filament::page>
    <div class="text-xl font-bold mb-4">Dashboard Admin POS Mainan</div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-filament::card>
            <div class="text-lg">Total Produk</div>
            <div class="text-3xl font-bold text-primary-600">
                {{ \App\Models\Produk::count() }}
            </div>
        </x-filament::card>

        <x-filament::card>
            <div class="text-lg">Total Testimoni</div>
            <div class="text-3xl font-bold text-primary-600">
                {{ \App\Models\Testimoni::count() }}
            </div>
        </x-filament::card>
    </div>
</x-filament::page>
