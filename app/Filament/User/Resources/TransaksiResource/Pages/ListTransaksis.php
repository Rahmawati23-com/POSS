<?php

namespace App\Filament\User\Resources\TransaksiResource\Pages;

use App\Filament\User\Resources\TransaksiResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListTransaksis extends ListRecords
{
    protected static string $resource = TransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}