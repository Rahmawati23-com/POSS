<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniResource\Pages;
use App\Models\Testimoni;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput, Textarea, FileUpload, Select};
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn, SelectColumn, DateColumn};
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DatePicker;


class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Konten Web';
    protected static ?string $navigationLabel = 'Testimoni Produk';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama_tokoh')
                ->label('Nama Pelanggan')
                ->required()
                ->maxLength(100),

            FileUpload::make('foto')
                ->label('Foto')
                ->image()
                ->directory('testimoni'),

            Select::make('produk_id')
                ->label('Produk')
                ->relationship('produk', 'nama')
                ->required()
                ->searchable(),

            Select::make('rating')
                ->label('Rating')
                ->options([
                    1 => '⭐️',
                    2 => '⭐️⭐️',
                    3 => '⭐️⭐️⭐️',
                    4 => '⭐️⭐️⭐️⭐️',
                    5 => '⭐️⭐️⭐️⭐️⭐️',
                ])
                ->required(),

            Textarea::make('komentar')
                ->label('Komentar')
                ->required()
                ->rows(4),

            DatePicker::make('tanggal')
                ->label('Tanggal Testimoni')
                ->default(now())
                ->required(),

            Select::make('kategori_tokoh_id')
                ->label('Kategori Tokoh')
                ->relationship('kategoriTokoh', 'nama') 
                ->required()
                ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')->label('Foto')->circular()->width(50),
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('produk.nama')->label('Produk')->sortable()->searchable(),
                IconColumn::make('rating')
                    ->label('Rating')
                    ->icons([
                        1 => 'heroicon-o-star',
                        2 => 'heroicon-o-star',
                        3 => 'heroicon-o-star',
                        4 => 'heroicon-o-star',
                        5 => 'heroicon-o-star',
                    ])
                    ->getStateUsing(fn ($record) => str_repeat('⭐️', $record->rating)),
                TextColumn::make('isi')->label('Komentar')->limit(40)->wrap(),
                TextColumn::make('created_at')->label('Tanggal')->dateTime('d M Y'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonis::route('/'),
            'create' => Pages\CreateTestimoni::route('/create'),
            'edit' => Pages\EditTestimoni::route('/{record}/edit'),
        ];
    }
}
