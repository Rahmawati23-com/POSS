<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use App\Models\Testimoni;
use App\Models\Produk;
use App\Models\KategoriTokoh;
use Filament\Forms\Components\{TextInput, Textarea, FileUpload, Select};
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Notifications\Notification;

class TestimoniView extends Page implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Testimoni';
    protected static ?string $navigationGroup = 'Produk';
    protected static string $view = 'filament.user.pages.testimoni-view';
    protected static ?int $navigationSort = 3;

    public $testimoniList;
    public $showCreateForm = false;
    
    // Form data - tambahkan property $data
    public ?array $data = [];

    public function mount(): void
    {
        $this->loadTestimoni();
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_tokoh')
                    ->label('Nama Anda')
                    ->required()
                    ->maxLength(100),

                FileUpload::make('foto')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('testimoni')
                    ->maxSize(2048),

                Select::make('produk_id')
                    ->label('Produk')
                    ->options(Produk::pluck('nama', 'id'))
                    ->required()
                    ->searchable(),

                Select::make('rating')
                    ->label('Rating')
                    ->options([
                        1 => '⭐️ (1 Bintang)',
                        2 => '⭐️⭐️ (2 Bintang)',
                        3 => '⭐️⭐️⭐️ (3 Bintang)',
                        4 => '⭐️⭐️⭐️⭐️ (4 Bintang)',
                        5 => '⭐️⭐️⭐️⭐️⭐️ (5 Bintang)',
                    ])
                    ->required(),

                Textarea::make('komentar')
                    ->label('Komentar/Review')
                    ->required()
                    ->rows(4)
                    ->maxLength(500),

                Select::make('kategori_tokoh_id')
                    ->label('Kategori Tokoh Favorit')
                    ->options(KategoriTokoh::pluck('nama', 'id'))
                    ->required()
                    ->searchable(),
            ])
            ->statePath('data');
    }

    public function loadTestimoni(): void
    {
        $this->testimoniList = Testimoni::with(['produk', 'kategoriTokoh'])
                                     ->orderBy('created_at', 'desc')
                                     ->get();
    }

    public function toggleCreateForm(): void
    {
        $this->showCreateForm = !$this->showCreateForm;
        if (!$this->showCreateForm) {
            $this->form->fill();
        }
    }

    public function createTestimoni(): void
    {
        $data = $this->form->getState();

        try {
            Testimoni::create([
                'nama_tokoh' => $data['nama_tokoh'],
                'foto' => $data['foto'],
                'produk_id' => $data['produk_id'],
                'rating' => $data['rating'],
                'komentar' => $data['komentar'],
                'kategori_tokoh_id' => $data['kategori_tokoh_id'],
                'tanggal' => now(),
            ]);

            Notification::make()
                ->title('Testimoni berhasil dibuat!')
                ->success()
                ->send();

            $this->form->fill();
            $this->showCreateForm = false;
            $this->loadTestimoni();

        } catch (\Exception $e) {
            Notification::make()
                ->title('Error!')
                ->body('Gagal membuat testimoni: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function formatRating($rating): string
    {
        return str_repeat('⭐️', $rating);
    }

    public function getTitle(): string
    {
        return 'Testimoni Produk';
    }

    public function getHeading(): string
    {
        return 'Testimoni Produk';
    }

    public function getSubheading(): ?string
    {
        return 'Lihat review dari pelanggan lain dan bagikan pengalaman Anda';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('create')
                ->label('Tulis Testimoni')
                ->icon('heroicon-o-plus')
                ->color('primary')
                ->action(fn() => $this->toggleCreateForm()),
        ];
    }
}