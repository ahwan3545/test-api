<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoresTableSeeder extends Seeder
{
    public function run()
    {
        $stores = [
            [
                'name' => 'Amazon',
                'image' => '/assets/images/stores/amazon.png',
                'website_url' => 'https://www.amazon.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'eBay',
                'image' => '/assets/images/stores/eBay.png',
                'website_url' => 'https://www.ebay.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Walmart',
                'image' => '/assets/images/stores/walmart.png',
                'website_url' => 'https://www.walmart.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AliExpress',
                'image' => '/assets/images/stores/aliexpress.png',
                'website_url' => 'https://www.aliexpress.com',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('stores')->insert($stores);
    }
}
