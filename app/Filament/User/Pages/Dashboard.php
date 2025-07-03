<?php

namespace App\Filament\User\Pages;

use App\Models\Order;
use App\Models\Testimoni;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.user.pages.dashboard';

    public $totalOrders;
    public $totalTestimoni;
    public $orderCounts = [];

    public function mount(): void
    {
        $this->totalOrders = Order::count();
        $this->totalTestimoni = Testimoni::count();

        $this->orderCounts = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('count(*) as total')
        )
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month')
        ->toArray();
    }
}
