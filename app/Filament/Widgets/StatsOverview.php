<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Bookings', Booking::count())
                ->description('Total number of orders')
                ->color('primary'),
            Stat::make('Pending Payments', Payment::where('status', 'pending')->count())
                ->description('Unfinished payments')
                ->color('warning'),
            Stat::make('Total Revenue', 'Rp ' . number_format(Payment::where('status', 'paid')->sum('amount'), 2, ',', '.'))
                ->description('Income from paid in full')
                ->color('success'),
            Stat::make('Active Users', User::where('role', 'customer')->count())
                ->description('Active users')
                ->color('info'),
        ];
    }
}