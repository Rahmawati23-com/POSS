<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Transaksi;
use Carbon\Carbon;

class PendapatanHarianChart extends ChartWidget
{
    protected static ?string $heading = 'Pendapatan Harian (7 Hari)';

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $labels[] = Carbon::now()->subDays($i)->format('d M');
            $data[] = Transaksi::whereDate('created_at', $date)->sum('total');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan',
                    'data' => $data,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.4)',
                ],
            ],
            'labels' => $labels,
        ];
    }
}
