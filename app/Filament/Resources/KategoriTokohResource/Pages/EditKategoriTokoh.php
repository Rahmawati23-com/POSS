<?php

namespace App\Filament\Resources\KategoriTokohResource\Pages;

use App\Filament\Resources\KategoriTokohResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriTokoh extends EditRecord
{
    protected static string $resource = KategoriTokohResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
