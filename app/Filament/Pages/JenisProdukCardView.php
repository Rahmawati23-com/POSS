<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\JenisProduk;

class JenisProdukCardView extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static string $view = 'filament.pages.jenis-produk-card-view';
    protected static ?string $navigationLabel = 'Jenis Produk (Card)';
    protected static ?string $navigationGroup = 'Card View';

    public $produkList;

    public function mount()
    {
        $this->produkList = JenisProduk::all();
    }
}
