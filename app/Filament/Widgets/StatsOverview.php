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
                ->description('Jumlah total pemesanan')
                ->color('primary'),
            Stat::make('Pending Payments', Payment::where('status', 'pending')->count())
                ->description('Pembayaran yang belum selesai')
                ->color('warning'),
            Stat::make('Total Revenue', 'Rp ' . number_format(Payment::where('status', 'paid')->sum('amount'), 2, ',', '.'))
                ->description('Pendapatan dari pembayaran lunas')
                ->color('success'),
            Stat::make('Active Users', User::where('role', 'customer')->count())
                ->description('Pengguna aktif')
                ->color('info'),
        ];
    }
}