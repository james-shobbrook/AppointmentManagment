<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone_number' => '123-456-7890',
        ]);

        Customer::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'phone_number' => '555-555-5555',
        ]);
    }
}
