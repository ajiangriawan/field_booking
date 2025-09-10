<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Columns\TextColumn;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?int $navigationSort = 1;
    protected static ?string $pluralLabel = 'Bookings';
    protected static ?string $modelLabel = 'Booking';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('field_id')
                    ->relationship('field', 'name')
                    ->required()
                    ->reactive(), // supaya memicu reload schedules

                Forms\Components\DatePicker::make('booking_date')
                    ->required()
                    ->reactive(),

                Forms\Components\CheckboxList::make('schedules')
                    ->options(function (callable $get) {
                        $fieldId = $get('field_id');
                        $date = $get('booking_date');
                        if (!$fieldId || !$date) {
                            \Log::info('No field_id or booking_date provided');
                            return [];
                        }
                        $dayOfWeek = Carbon::parse($date)->format('l');
                        $dayMapping = [
                            'Monday' => 'monday',
                            'Tuesday' => 'tuesday',
                            'Wednesday' => 'wednesday',
                            'Thursday' => 'thursday',
                            'Friday' => 'friday',
                            'Saturday' => 'saturday',
                            'Sunday' => 'sunday'
                        ];
                        $dbDayFormat = $dayMapping[$dayOfWeek] ?? strtolower($dayOfWeek);
                        $schedules = \App\Models\FieldSchedule::where('field_id', $fieldId)
                            ->where('day_of_week', $dbDayFormat)
                            ->where('is_active', true)
                            ->whereDoesntHave('bookings', function ($q) use ($date) {
                                $q->where('booking_date', $date)
                                    ->whereIn('status', ['pending', 'confirmed']);
                            })
                            ->get();
                        \Log::info('Available Schedules:', $schedules->toArray());
                        return $schedules->mapWithKeys(function ($schedule) use ($date) {
                            $dayName = Carbon::parse($date)->translatedFormat('l');
                            $timeRange = Carbon::parse($schedule->start_time)->format('H:i')
                                . ' - '
                                . Carbon::parse($schedule->end_time)->format('H:i');
                            $price = number_format($schedule->price, 0, ',', '.');
                            return [
                                $schedule->id => "{$dayName} | {$timeRange} | Rp {$price}"
                            ];
                        });
                    })
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if (empty($state)) {
                            $set('total_price', 0);
                            $set('dp_amount', 0);
                            $set('remaining_amount', 0);
                            return;
                        }

                        // Hitung total harga berdasarkan schedule yang dipilih
                        $totalPrice = \App\Models\FieldSchedule::whereIn('id', $state)
                            ->sum('price');

                        // Hitung DP (misalnya 20% dari total harga)
                        $dpAmount = $totalPrice * 0.2; // 20% DP
                        $remainingAmount = $totalPrice - $dpAmount;

                        $set('total_price', $totalPrice);
                        $set('dp_amount', $dpAmount);
                        $set('remaining_amount', $remainingAmount);
                    })
                    ->helperText('Pilih satu atau lebih jadwal yang masih tersedia pada tanggal tersebut.'),

                Forms\Components\TextInput::make('total_price')
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled()
                    ->dehydrated()
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.'))
                    ->helperText('Total harga dihitung otomatis berdasarkan schedule yang dipilih.'),

                Forms\Components\TextInput::make('dp_amount')
                    ->label('DP Amount (20%)')
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled()
                    ->dehydrated()
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.'))
                    ->helperText('Uang muka 20% dari total harga.'),

                Forms\Components\TextInput::make('remaining_amount')
                    ->label('Remaining Amount')
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled()
                    ->dehydrated()
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.'))
                    ->helperText('Sisa pembayaran yang harus dibayar.'),

                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'dp_paid' => 'DP Paid',
                        'fully_paid' => 'Success',
                        'canceled' => 'Canceled',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Booking::query()->with('fieldSchedules')) // Muat relasi untuk efisiensi
            ->columns([
                //Tables\Columns\TextColumn::make('id')->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('field.name')
                    ->label('Field')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('booking_date')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('schedules_eloquent')
                    ->label('Schedules Eloquent')
                    ->getStateUsing(function ($record) {
                        $fieldSchedules = $record->fieldSchedules()
                            ->select('start_time', 'end_time')
                            ->orderBy('start_time')
                            ->get();

                        if ($fieldSchedules->isEmpty()) {
                            return '-';
                        }

                        return $fieldSchedules->map(function ($schedule) {
                            $startTime = Carbon::parse($schedule->start_time)->format('H:i');
                            $endTime = Carbon::parse($schedule->end_time)->format('H:i');
                            return $startTime . ' - ' . $endTime;
                        })->implode(', ');
                    })
                    ->sortable(false),

                Tables\Columns\TextColumn::make('total_price')
                    ->money('IDR', true),

                Tables\Columns\BadgeColumn::make('status')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'pending' => 'Pending',
                            'dp_paid' => 'DP Paid',
                            'fully_paid' => 'Success',
                            'canceled' => 'Canceled',
                            default => ucfirst($state), // Fallback untuk status tak dikenal
                        };
                    })
                    ->colors([
                        'warning' => fn($state) => in_array($state, ['pending', 'dp_paid']),
                        'success' => 'fully_paid',
                        'danger' => 'canceled',
                    ]),

                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime('d M Y H:i')
                //     ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'dp_paid' => 'DP Paid',
                        'fully_paid' => 'Success',
                        'canceled'  => 'Canceled',
                    ]),

                Tables\Filters\Filter::make('booking_date')
                    ->form([
                        Forms\Components\DatePicker::make('booking_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('booking_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['booking_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('booking_date', '>=', $date),
                            )
                            ->when(
                                $data['booking_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('booking_date', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['booking_from'] ?? null) {
                            $indicators[] = 'Dari: ' . Carbon::parse($data['booking_from'])->format('d M Y');
                        }
                        if ($data['booking_until'] ?? null) {
                            $indicators[] = 'Sampai: ' . Carbon::parse($data['booking_until'])->format('d M Y');
                        }
                        return $indicators;
                    }),
                Tables\Filters\SelectFilter::make('field_id')
                    ->label('Field')
                    ->relationship('field', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
