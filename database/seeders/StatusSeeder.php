<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            ['name' => 'Pending'],
            ['name' => 'Confirmed'],
            ['name' => 'Cancelled'],
            ['name' => 'Completed'],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
