<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget;
use App\Models\Transaksi;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class RecentTransactions extends TableWidget
{
    protected static ?string $heading = 'Transaksi Terakhir';


    protected function getTableQuery(): Builder|Relation|null    {
        return Transaksi::latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('kode')->label('Kode'),
            TextColumn::make('user.name')->label('Kasir'),
            TextColumn::make('tanggal')->label('Tanggal')->dateTime(),
            TextColumn::make('total')->label('Total')->money('IDR'),
        ];
    }
}
