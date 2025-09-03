<?php

namespace App\Filament\Resources\FieldScheduleResource\Pages;

use App\Filament\Resources\FieldScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFieldSchedule extends CreateRecord
{
    protected static string $resource = FieldScheduleResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $days = $data['day_of_week'] ?? [];
        unset($data['day_of_week']);

        $createdRecords = collect();

        foreach ($days as $day) {
            $recordData = $data;
            $recordData['day_of_week'] = $day;

            $createdRecords->push($this->getModel()::create($recordData));
        }

        // Kembalikan record pertama sebagai representasi
        return $createdRecords->first();
    }
}