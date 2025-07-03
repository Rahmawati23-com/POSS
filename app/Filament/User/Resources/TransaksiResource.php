<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class; 

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Transaksi';
    protected static ?string $navigationGroup = 'Transaksi';

    public static function form(Form $form): Form
    {
        return \App\Filament\Resources\TransaksiResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')->label('Kode')->searchable(),
                Tables\Columns\TextColumn::make('tanggal')->dateTime('d M Y H:i')->label('Tanggal'),
                Tables\Columns\TextColumn::make('total')->money('IDR')->label('Total'),
                Tables\Columns\TextColumn::make('pembayaran')->label('Pembayaran'),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'selesai',
                        'warning' => 'pending',
                        'danger' => 'batal',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
            'view' => Pages\ViewTransaksi::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return true;
    }

    public static function canEdit(Model $record): bool
    {
        return $record->user_id === Auth::id();
    }

    public static function canView(Model $record): bool
    {
        return $record->user_id === Auth::id();
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
}