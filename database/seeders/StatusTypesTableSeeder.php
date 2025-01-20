<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTypesTableSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            [
                'name' => 'Pending',
                'color' => '#ffc107', // Amber (indicates waiting)
                'icon' => null,
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'On Review',
                'color' => '#007bff', // Blue (indicates active review process)
                'icon' => null,
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sent Offer',
                'color' => '#17a2b8', // Cyan (indicates communication)
                'icon' => null,
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer Approved',
                'color' => '#28a745', // Green (indicates success or approval)
                'icon' => null,
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rejected',
                'color' => '#dc3545', // Red (indicates rejection or error)
                'icon' => null,
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Completed',
                'color' => '#6c757d', // Gray (indicates neutral or finished state)
                'icon' => null,
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('status_types')->insert($statuses);
    }
}
