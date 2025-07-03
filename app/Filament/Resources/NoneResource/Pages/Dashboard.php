<?php

namespace App\Filament\Resources\NoneResource\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.resources.none-resource.pages.dashboard';

    protected static ?string $title = 'Dashboard';

    protected static ?string $navigationLabel = 'Dashboard';
}

