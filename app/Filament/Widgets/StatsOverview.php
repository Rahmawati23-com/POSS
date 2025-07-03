<?php

namespace App\Filament\Widgets;

use App\Models\Produk;
use App\Models\Transaksi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Produk', Produk::count())
                ->icon('heroicon-o-cube')
                ->description('Jumlah produk yang tersedia')
                ->color('primary'),

            Card::make('Total Transaksi', Transaksi::count())
                ->icon('heroicon-o-currency-dollar')
                ->description('Seluruh transaksi yang tercatat')
                ->color('success'),

            Card::make('Pendapatan Hari Ini', 'Rp ' . number_format(
                Transaksi::whereDate('created_at', Carbon::today())->sum('total'),
                0, ',', '.'
            ))
                ->icon('heroicon-o-banknotes')
                ->description('Transaksi masuk hari ini')
                ->color('warning'),
        ];
    }
}
