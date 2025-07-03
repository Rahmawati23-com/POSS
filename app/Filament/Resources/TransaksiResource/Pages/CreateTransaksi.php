<?php

namespace App\Filament\Resources\TransaksiResource\Pages;

use App\Filament\Resources\TransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class CreateTransaksi extends CreateRecord
{
    protected static string $resource = TransaksiResource::class;

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()->label('Bayar'),
            $this->getCreateAnotherFormAction()->label('Bayar & Transaksi Baru'),
            $this->getCancelFormAction()->label('Batal'),
        ];
    }

    public function formActions(): array
    {
        return $this->getFormActions();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['kode'] = 'TRX-' . now()->format('YmdHis');
        $data['tanggal'] = now();
        $data['total'] = collect($data['details'] ?? [])
            ->sum(fn ($item) => \Illuminate\Support\Arr::get($item, 'subtotal', 0));

        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->record->details as $detail) {
            $produk = $detail->produk;
            if ($produk) {
                $produk->decrement('stok', $detail->jumlah);
            }
        }
    }
}
