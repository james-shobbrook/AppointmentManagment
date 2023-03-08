<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\Customer;
use App\Models\Status;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        $customer1 = Customer::where('name', 'John Doe')->first();
        $customer2 = Customer::where('name', 'Jane Smith')->first();
        $statuses = Status::all();
        $appointmentTypes = AppointmentType::all();

        foreach ($appointmentTypes as $type) {
            $date = now()->addDays(rand(1, 30))->setTime(rand(9, 16), 0, 0);
            $duration = rand(30, 120);

            $status = $statuses->random();

            $appointment = Appointment::create([
                'appointment_type_id' => $type->id,
                'date_time' => $date,
                'duration' => $duration,
            ]);

            $appointment->customers()->attach($customer1, [
                'status_id' => $status->id,
                'notes' => 'Appointment notes for customer 1',
            ]);

            $appointment->customers()->attach($customer2, [
                'status_id' => $status->id,
                'notes' => 'Appointment notes for customer 2',
            ]);
        }
    }
}

