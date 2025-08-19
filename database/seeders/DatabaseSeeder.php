<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Field;
use App\Models\FieldSchedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        // Create customer
        User::create([
            'name' => 'Customer',
            'email' => 'customer@customer.com',
            'password' => Hash::make('password'),
        ]);

        // Create fields
        $field1 = Field::create([
            'name' => 'Lapangan A',
            'description' => 'Lapangan futsal indoor dengan fasilitas lengkap',
            'is_active' => true
        ]);

        $field2 = Field::create([
            'name' => 'Lapangan B',
            'description' => 'Lapangan futsal outdoor dengan rumput sintetis',
            'is_active' => true
        ]);

        // Create schedules for each field
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $times = [
            ['08:00', '09:00', 100000],
            ['09:00', '10:00', 120000],
            ['10:00', '11:00', 150000],
            ['11:00', '12:00', 180000],
            ['12:00', '13:00', 200000],
            ['13:00', '14:00', 180000],
            ['14:00', '15:00', 150000],
            ['15:00', '16:00', 120000],
            ['16:00', '17:00', 150000],
            ['17:00', '18:00', 180000],
            ['18:00', '19:00', 200000],
            ['19:00', '20:00', 250000],
            ['20:00', '21:00', 300000],
            ['21:00', '22:00', 350000],
        ];

        foreach ([$field1, $field2] as $field) {
            foreach ($days as $day) {
                foreach ($times as [$startTime, $endTime, $price]) {
                    FieldSchedule::create([
                        'field_id' => $field->id,
                        'day_of_week' => $day,
                        'start_time' => $startTime,
                        'end_time' => $endTime,
                        'price' => $price,
                        'is_active' => true
                    ]);
                }
            }
        }
    }
}