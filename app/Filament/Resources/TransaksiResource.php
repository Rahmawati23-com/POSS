<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\{TextInput, Select, Repeater, Hidden};
use Filament\Tables\Columns\{TextColumn, BadgeColumn};
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Actions\Action;
use Filament\Notifications\Notification;


class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Transaksi Kasir';
    protected static ?string $navigationGroup = 'Transaksi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('kode')
                ->label('Kode Transaksi')
                ->disabled()
                ->dehydrated(false) 
                ->default('TRX-' . now()->format('YmdHis')),

            Hidden::make('user_id')
                ->default(Auth::id()),

            Select::make('pembayaran')
                ->label('Metode Pembayaran')
                ->options([
                    'Tunai' => 'Tunai',
                    'QRIS' => 'QRIS',
                    'Debit' => 'Debit',
                    'Transfer' => 'Transfer',
                ])
                ->required()
                ->native(false),

            Repeater::make('details')
                ->relationship()
                ->label('Daftar Produk')
                ->schema([
                    Select::make('produk_id')
                        ->relationship('produk', 'nama')
                        ->label('Produk')
                        ->searchable()
                        ->required()
                        ->live()
                        ->dehydrated() 
                        ->afterStateUpdated(function ($state, Set $set, Get $get) {
                            if ($state) {
                                $produk = \App\Models\Produk::find($state);
                                if ($produk) {
                                    $set('harga_satuan', $produk->harga);
                                    $jumlah = $get('jumlah') ?? 1;
                                    $subtotal = $produk->harga * $jumlah;
                                    $set('subtotal', $subtotal);
                                    
                                    $set('../../total', self::calculateTotal($get('../../details')));
                                }
                            }
                        }),

                    TextInput::make('jumlah')
                        ->numeric()
                        ->minValue(1)
                        ->default(1)
                        ->required()
                        ->live()
                        ->afterStateUpdated(function ($state, Set $set, Get $get) {
                            $harga = $get('harga_satuan');
                            if ($harga && $state) {
                                $subtotal = $harga * $state;
                                $set('subtotal', $subtotal);
                                
                                $set('../../total', self::calculateTotal($get('../../details')));
                            }
                        }),

                    TextInput::make('harga_satuan')
                        ->numeric()
                        ->required()
                        ->label('Harga Satuan')
                        ->prefix('Rp')
                        ->live()
                        ->afterStateUpdated(function ($state, Set $set, Get $get) {
                            $jumlah = $get('jumlah');
                            if ($jumlah && $state) {
                                $subtotal = $state * $jumlah;
                                $set('subtotal', $subtotal);
                                
                                // Update total setelah subtotal berubah
                                $set('../../total', self::calculateTotal($get('../../details')));
                            }
                        }),
                        
                    TextInput::make('subtotal')
                        ->numeric()
                        ->required()
                        ->label('Subtotal')
                        ->prefix('Rp')
                        ->dehydrated(true) 
                        ->readOnly() 
                        ->live(),
                ])
                ->createItemButtonLabel('Tambah Produk')
                ->columns(2)
                ->live()
                ->afterStateUpdated(function ($state, Set $set, Get $get) {
                    // Update total ketika item ditambah/diubah
                    $set('total', self::calculateTotal($state));
                })
                ->deleteAction(
                    fn (Forms\Components\Actions\Action $action) => 
                        $action->after(function (Set $set, Get $get) {
                            $set('total', self::calculateTotal($get('details')));
                        })
                ),

            TextInput::make('total')
                ->numeric()
                ->label('Total Harga')
                ->required()
                ->prefix('Rp')
                ->live()
                ->disabled()
                ->dehydrated()
        ]);
    }

    public static function calculateTotal($details): float
    {
        $total = 0;
        
        if (is_array($details)) {
            foreach ($details as $item) {
                if (isset($item['subtotal']) && is_numeric($item['subtotal'])) {
                    $total += (float) $item['subtotal'];
                }
            }
        }
        
        return $total;
    }

    public static function updateTotal(Set $set, Get $get): void
    {
        $details = $get('details');
        $total = self::calculateTotal($details);
        $set('total', $total);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->label('Kode')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('user.name')
                    ->label('Kasir')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
                    
                TextColumn::make('total')
                    ->money('IDR')
                    ->label('Total')
                    ->sortable(),

                TextColumn::make('pembayaran')->label('Pembayaran'),
                    
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'selesai',
                        'warning' => 'pending',
                        'danger' => 'batal',
                    ])
                    ->default('selesai'),
            ])
            ->defaultSort('tanggal', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Kasir')
                    ->relationship('user', 'name'),
                    
                Tables\Filters\Filter::make('tanggal')
                    ->form([
                        Forms\Components\DatePicker::make('from')->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('until')->label('Sampai Tanggal'),
                    ])

                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make()
                    ->label('Edit'),
                Tables\Actions\Action::make('print')
                    ->label('Print Struk')
                    ->icon('heroicon-o-printer')
                    ->color('success')
                    ->url(fn (Transaksi $record): string => route('transaksi.print', $record))
                    ->openUrlInNewTab(),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Hapus Terpilih'),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Transaksi Pertama'),
            ]);

        Notification::make()
            ->title('Transaksi Berhasil')
            ->body('Transaksi berhasil diproses!')
            ->success()
            ->send();
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika diperlukan
            // 'details' => RelationManagers\DetailsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::whereDate('created_at', today())->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }

    // Helper method untuk format currency
    public static function formatCurrency($amount): string
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }

    // Method untuk generate kode transaksi unik
    public static function generateTransactionCode(): string
    {
        $prefix = 'TRX-';
        $date = now()->format('Ymd');
        $lastTransaction = static::getModel()::whereDate('created_at', today())
            ->orderBy('id', 'desc')
            ->first();
        
        $number = $lastTransaction ? 
            intval(substr($lastTransaction->kode, -4)) + 1 : 
            1;
        
        return $prefix . $date . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}