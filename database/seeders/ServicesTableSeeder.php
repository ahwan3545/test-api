<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Amazon',
                'image' => '/assets/images/stores/amazon.png',
                'url' => 'https://www.amazon.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'eBay',
                'image' => '/assets/images/stores/eBay.png',
                'url' => 'https://www.ebay.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Walmart',
                'image' => '/assets/images/stores/walmart.png',
                'url' => 'https://www.walmart.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AliExpress',
                'image' => '/assets/images/stores/aliexpress.png',
                'url' => 'https://www.aliexpress.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('services')->insert($services);
    }
}
