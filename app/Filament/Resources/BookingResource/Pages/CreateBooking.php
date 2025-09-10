<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

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
    }

    protected $scheduleIds = [];
}
