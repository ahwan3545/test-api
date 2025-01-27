<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertismentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advertisements = [
            [
                'title' => 'Amazon',
                'image' => '/assets/images/stores/amazon.png',
                'url' => 'https://www.amazon.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'eBay',
                'image' => '/assets/images/stores/eBay.png',
                'url' => 'https://www.ebay.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Walmart',
                'image' => '/assets/images/stores/walmart.png',
                'url' => 'https://www.walmart.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'AliExpress',
                'image' => '/assets/images/stores/aliexpress.png',
                'url' => 'https://www.aliexpress.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('advertisements')->insert($advertisements);
    }
}
