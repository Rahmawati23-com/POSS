<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Models\Produk;
use App\Models\JenisProduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')
                    ->label('Kode Produk')
                    ->required()
                    ->maxLength(20),

                Forms\Components\TextInput::make('nama')
                    ->label('Nama Produk')
                    ->required()
                    ->maxLength(100),

                Forms\Components\Select::make('jenis_produk_id')
                    ->label('Jenis Produk')
                    ->relationship('jenisProduk', 'nama')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('kategori_tokoh_id')
                    ->label('Kategori Tokoh')
                    ->relationship('kategoriTokoh', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('stok')
                    ->label('Stok')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('min_stok')
                    ->label('Minimum Stok')
                    ->numeric(),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->directory('produk')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(2048),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')
                    ->label('Kode'),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Produk')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jenisProduk.nama')
                    ->label('Jenis'),

                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->circular()
                    ->height(50)
                    ->width(50),

                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR', true),

                Tables\Columns\TextColumn::make('stok')
                    ->label('Stok'),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
