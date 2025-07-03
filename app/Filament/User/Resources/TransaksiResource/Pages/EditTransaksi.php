<?php

namespace App\Filament\User\Resources\TransaksiResource\Pages;

use App\Filament\User\Resources\TransaksiResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditTransaksi extends EditRecord
{
    protected static string $resource = TransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
