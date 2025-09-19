<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->scheduleIds = $data['schedules'] ?? []; // Ubah dari schedule_ids ke schedules
        unset($data['schedules']);
        return $data;
    }

    protected function afterCreate(): void
    {
        // Simpan ke pivot table booking_field_schedule setelah booking berhasil dibuat
        if (!empty($this->scheduleIds) && $this->record) {
            // Insert ke pivot table
            $pivotData = [];
            foreach ($this->scheduleIds as $scheduleId) {
                $pivotData[] = [
                    'booking_id' => $this->record->id,
                    'field_schedule_id' => $scheduleId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if (!empty($pivotData)) {
                DB::table('booking_field_schedule')->insert($pivotData);
            }
        }

        $booking = $this->record;

        // Buat DP
        $dp = Payment::create([
            'booking_id' => $booking->id,
            'payment_type' => 'dp',
            'amount' => $booking->dp_amount,
            'payment_method' => $booking->payment_method,
            'status' => 'pending',
        ]);

        // Buat Remaining
        $remaining = Payment::create([
            'booking_id' => $booking->id,
            'payment_type' => 'remaining',
            'amount' => $booking->remaining_amount,
            'payment_method' => $booking->payment_method,
            'status' => 'pending',
        ]);

        // 🔹 Kalau langsung fully paid
        if ($booking->status === 'fully_paid') {
            $booking->payments()->update([
                'status' => 'paid',
                'paid_at' => now(),
            ]);
        }
    }

    protected $scheduleIds = [];
}
