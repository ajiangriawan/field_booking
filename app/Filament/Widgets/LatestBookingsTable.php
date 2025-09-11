<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestBookingsTable extends TableWidget
{
    protected static ?string $heading = 'Latest Orders';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Booking::query()->latest()->limit(5))
            ->columns([
                Tables\Columns\TextColumn::make('booking_code')->label('Kode Booking'),
                Tables\Columns\TextColumn::make('user.name')->label('Pengguna'),
                Tables\Columns\TextColumn::make('field.name')->label('Lapangan'),
                Tables\Columns\TextColumn::make('booking_date')->label('Tanggal')->date(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'dp_paid' => 'info',
                        'fully_paid' => 'success',
                        'cancelled' => 'danger',
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ]);
    }
}