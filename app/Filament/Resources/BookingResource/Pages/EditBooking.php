<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\DB;

class EditBooking extends EditRecord
{
    protected static string $resource = BookingResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if ($this->record) {
            $scheduleIds = DB::table('booking_field_schedule')
                ->where('booking_id', $this->record->id)
                ->pluck('field_schedule_id')
                ->toArray();
            $data['schedules'] = $scheduleIds; // Ubah dari schedule_ids ke schedules
        }
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->scheduleIds = $data['schedules'] ?? []; // Ubah dari schedule_ids ke schedules
        unset($data['schedules']);
        return $data;
    }

    protected function afterSave(): void
    {
        if ($this->record) {
            \Log::info('Updating pivot data for booking ID: ' . $this->record->id, $this->scheduleIds);
            $this->record->fieldSchedules()->sync($this->scheduleIds); // Gunakan sync untuk efisiensi
        }
    }

    protected $scheduleIds = [];
}
