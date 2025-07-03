<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisProdukResource\Pages;
use App\Models\JenisProduk;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;

class JenisProdukResource extends Resource
{
    protected static ?string $model = JenisProduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Jenis Produk';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Jenis Produk')
                    ->required()
                    ->maxLength(100),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->directory('jenis-produk')
                    ->disk('public') // <- PENTING
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(2048)
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Jenis Produk')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->height(60)
                    ->width(60)
                    ->extraImgAttributes([
                        'style' => 'object-fit: cover; border-radius: 6px;',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJenisProduks::route('/'),
            'create' => Pages\CreateJenisProduk::route('/create'),
            'edit' => Pages\EditJenisProduk::route('/{record}/edit'),
        ];
    }
}
