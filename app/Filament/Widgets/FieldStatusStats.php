<?php

namespace App\Filament\Widgets;

use App\Models\Field;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FieldStatusStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Active Fields', Field::where('is_active', true)->count())
                ->description('Lapangan yang tersedia')
                ->color('success'),
            Stat::make('Inactive Fields', Field::where('is_active', false)->count())
                ->description('Lapangan yang tidak aktif')
                ->color('danger'),
        ];
    }
}