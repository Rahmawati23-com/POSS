<?php

namespace App\Filament\User\Resources\TransaksiResource\Pages;

use App\Filament\User\Resources\TransaksiResource;
use Filament\Resources\Pages\ViewRecord;
    use Filament\Pages\Actions\EditAction;
    use Filament\Pages\Actions\Action;
    use Filament\Infolists\Infolist;
    use Filament\Infolists\Components\TextEntry;
    use Filament\Infolists\Components\RepeatableEntry;

    class ViewTransaksi extends ViewRecord
    {
        protected static string $resource = TransaksiResource::class;

        public function getHeaderActions(): array
        {
            return [
                EditAction::make(),
                Action::make('print')
                    ->label('Print Struk')
                    ->icon('heroicon-o-printer')
                    ->url(fn () => route('transaksi.print', $this->record))
                    ->openUrlInNewTab()
            ];
        }

        public function infolist(Infolist $infolist): Infolist
        {
            return $infolist->schema([
                TextEntry::make('kode')->label('Kode Transaksi'),
                TextEntry::make('tanggal')->dateTime()->label('Tanggal'),
                TextEntry::make('pembayaran')->label('Metode Pembayaran'),
                TextEntry::make('total')->money('IDR')->label('Total Harga'),
                TextEntry::make('status')->label('Status'),
                TextEntry::make('user.name')->label('Nama Pembeli'),

                RepeatableEntry::make('details')
                    ->label('Produk Dibeli')
                    ->schema([
                        TextEntry::make('produk.nama')->label('Produk'),
                        TextEntry::make('jumlah')->label('Jumlah'),
                        TextEntry::make('harga_satuan')->money('IDR')->label('Harga Satuan'),
                        TextEntry::make('subtotal')->money('IDR')->label('Subtotal'),
                    ])
                    ->columns(2),
            ]);
        }
    }
