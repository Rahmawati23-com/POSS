<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Produk;

class ProdukCardView extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Produk (Card)';
    protected static ?string $navigationGroup = 'Card View';
    protected static string $view = 'filament.pages.produk-card-view';
    
    public $produkList;
    public $jenisProdukList; 
    public $kategoriTokohList; 
    public $searchTerm = '';
    public $selectedJenis = '';
    public $selectedKategori = '';
    public $selectedCategory = ''; 
    public $sortBy = 'nama';
    public $sortDirection = 'asc';
    
    protected $queryString = [
        'searchTerm' => ['except' => ''],
        'selectedJenis' => ['except' => ''],
        'selectedKategori' => ['except' => ''],
        'selectedCategory' => ['except' => ''],
        'sortBy' => ['except' => 'nama'],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function mount(): void
    {
        $this->loadProduk();
        $this->loadFilterOptions(); // Load filter options
    }

    public function loadProduk(): void
    {
        $query = Produk::with(['jenisProduk', 'kategoriTokoh']);

        if ($this->searchTerm) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('kode', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('deskripsi', 'like', '%' . $this->searchTerm . '%');
            });
        }

        // Filter jenis produk
        if ($this->selectedJenis) {
            $query->where('jenis_produk_id', $this->selectedJenis);
        }

        // Filter kategori tokoh
        if ($this->selectedKategori) {
            $query->where('kategori_tokoh_id', $this->selectedKategori);
        }

        // Sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        $this->produkList = $query->get();
    }

    public function loadFilterOptions(): void
    {
        // Load as collections to preserve object structure
        $this->jenisProdukList = \App\Models\JenisProduk::select('id', 'nama')->get();
        $this->kategoriTokohList = \App\Models\KategoriTokoh::select('id', 'nama')->get();
    }

    public function updatedSearchTerm(): void
    {
        $this->loadProduk();
    }

    public function updatedSelectedJenis(): void
    {
        $this->loadProduk();
    }

    public function updatedSelectedKategori(): void
    {
        $this->selectedCategory = $this->selectedKategori; // Sync the values
        $this->loadProduk();
    }

    public function updatedSelectedCategory(): void
    {
        $this->selectedKategori = $this->selectedCategory; // Sync the values
        $this->loadProduk();
    }

    public function sortBy($field): void
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
        
        $this->loadProduk();
    }

    public function resetFilters(): void
    {
        $this->searchTerm = '';
        $this->selectedJenis = '';
        $this->selectedKategori = '';
        $this->selectedCategory = '';
        $this->sortBy = 'nama';
        $this->sortDirection = 'asc';
        $this->loadProduk();
    }

    public function getJenisOptions(): array
    {
        return $this->jenisProdukList ? $this->jenisProdukList->pluck('nama', 'id')->toArray() : [];
    }

    public function getKategoriOptions(): array
    {
        return $this->kategoriTokohList ? $this->kategoriTokohList->pluck('nama', 'id')->toArray() : [];
    }

    public function formatRupiah($amount): string
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}