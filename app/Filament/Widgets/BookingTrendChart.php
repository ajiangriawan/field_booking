<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BookingTrendChart extends ChartWidget
{
    protected static ?string $heading = 'Monthly Ordering Trends';
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = Booking::select(
                DB::raw('DATE_FORMAT(booking_date, "%Y-%m") as month'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => 'Booking',
                    'data' => array_values($data),
                    'backgroundColor' => '#3b82f6',
                    'borderColor' => '#2563eb',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}