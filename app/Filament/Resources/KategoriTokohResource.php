<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriTokohResource\Pages;
use App\Models\KategoriTokoh;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriTokohResource extends Resource
{
    protected static ?string $model = KategoriTokoh::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Kategori Tokoh';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Kategori Tokoh')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Kategori Tokoh')
                    ->searchable()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriTokohs::route('/'),
            'create' => Pages\CreateKategoriTokoh::route('/create'),
            'edit' => Pages\EditKategoriTokoh::route('/{record}/edit'),
        ];
    }
}
