<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\PendapatanHarianChart;
use App\Filament\Widgets\RecentTransactions;
use App\Filament\Widgets\StatsOverview;

class AdminDashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $navigationGroup = 'Menu Utama';
}
