<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use App\Models\Produk;
use App\Models\JenisProduk;
use App\Models\KategoriTokoh;

class ProdukCardView extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Katalog Produk';
    protected static ?string $navigationGroup = 'Produk';
    protected static string $view = 'filament.user.pages.produk-card-view';
    protected static ?int $navigationSort = 1;
    
    public $produkList;
    public $searchTerm = '';
    public $selectedCategory = '';
    public $jenisProdukList;

    public function mount(): void
    {
        try {
            $this->jenisProdukList = JenisProduk::all();
            $this->loadProduk();
        } catch (\Exception $e) {
            logger()->error('Error in ProdukCardView mount: ' . $e->getMessage());
            $this->produkList = collect(); // Empty collection as fallback
            $this->jenisProdukList = collect();
        }
    }

    public function loadProduk(): void
    {
        try {
            $query = Produk::with(['jenisProduk', 'kategoriTokoh'])
                          ->where('stok', '>', 0)
                          ->orderBy('nama');

            if ($this->searchTerm) {
                $query->where(function($q) {
                    $q->where('nama', 'like', '%' . $this->searchTerm . '%')
                      ->orWhere('deskripsi', 'like', '%' . $this->searchTerm . '%')
                      ->orWhere('kode', 'like', '%' . $this->searchTerm . '%');
                });
            }

            if ($this->selectedCategory) {
                $query->where('jenis_produk_id', $this->selectedCategory);
            }

            $this->produkList = $query->get();
        } catch (\Exception $e) {
            logger()->error('Error loading produk: ' . $e->getMessage());
            $this->produkList = collect();
        }
    }

    public function updatedSearchTerm(): void
    {
        $this->loadProduk();
    }

    public function updatedSelectedCategory(): void
    {
        $this->loadProduk();
    }

    public function resetFilters(): void
    {
        $this->searchTerm = '';
        $this->selectedCategory = '';
        $this->loadProduk();
    }

    public function getTitle(): string
    {
        return 'Katalog Produk';
    }

    public function getHeading(): string
    {
        return 'Katalog Produk';
    }

    public function getSubheading(): ?string
    {
        return 'Jelajahi semua produk yang tersedia';
    }
}