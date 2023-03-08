<?php

namespace Database\Seeders;

use App\Models\AppointmentType;
use Illuminate\Database\Seeder;

class AppointmentTypeSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            AppointmentType::create([
                'name' => 'Appointment Type ' . $i,
                'description' => 'Description for appointment type ' . $i,
            ]);
        }
    }
}
