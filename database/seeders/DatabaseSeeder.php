<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Field;
use App\Models\FieldSchedule;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => bcrypt('password'),
        ]);

        // Buat beberapa lapangan
        $field1 = Field::create([
            'name' => 'Lapangan A',
            'is_active' => true,
        ]);
        $field2 = Field::create([
            'name' => 'Lapangan B',
            'is_active' => true,
        ]);

        // Buat jadwal untuk Lapangan A
        foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day) {
            FieldSchedule::create([
                'field_id' => $field1->id,
                'day_of_week' => $day,
                'start_time' => '08:00',
                'end_time' => '09:00',
                'price' => 150000,
                'is_active' => true,
            ]);
            FieldSchedule::create([
                'field_id' => $field1->id,
                'day_of_week' => $day,
                'start_time' => '09:00',
                'end_time' => '10:00',
                'price' => 150000,
                'is_active' => true,
            ]);
        }

        // Buat jadwal untuk Lapangan B
        foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day) {
            FieldSchedule::create([
                'field_id' => $field2->id,
                'day_of_week' => $day,
                'start_time' => '13:00',
                'end_time' => '14:00',
                'price' => 200000,
                'is_active' => true,
            ]);
        }
    }
}