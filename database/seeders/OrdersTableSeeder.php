<?php

namespace Database\Seeders;

use App\Models\Attachment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            1, // Pending
            2, // On Review
            3, // Sent Offer
            4, // Customer Approved
            5, // Rejected
            6, // Completed
        ];

        $colors = ['Red', 'Blue', 'Green', 'Black', 'White', 'Yellow', 'Purple'];
        $sizes = ['Small', 'Medium', 'Large', 'XL', 'XXL'];
        $images = [
            'https://hexacom-admin.6amtech.com/storage/app/public/product/2023-11-26-656348523e599.png',
            'https://hexacom-admin.6amtech.com/storage/app/public/product/2021-03-13-604c8e16a3347.png',
            'https://m.media-amazon.com/images/I/61yhq8U6imL._AC_SX466_.jpg',
            'https://m.media-amazon.com/images/I/71TKMMyLCAL.__AC_SX300_SY300_QL70_FMwebp_.jpg',
            'https://m.media-amazon.com/images/I/71Fp3nnXI2L._AC_UY327_FMwebp_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71SwszHutIL._AC_UY327_FMwebp_QL65_.jpg',
        ];

        for ($i = 1; $i <= 20; $i++) {
            $orderNumber = Order::generateOrderNumber();
            DB::table('orders')->insert([
                'order_number' => $orderNumber,
                'customer_id' => rand(1, 5),
                'store_id' => rand(1, 4),
                'product_name' => 'Product ' . $i,
                'product_link' => 'http://example.com/product/' . $i,
                'product_price' => rand(50, 500),
                'quantity' => rand(1, 10),
                'product_image' => null,
                'product_color' => $colors[array_rand($colors)],
                'product_size' => $sizes[array_rand($sizes)],
                'product_weight' => rand(1, 10) . 'kg',
                'product_volume' => rand(10, 100) . 'cm³',
                'local_shipping' => rand(10, 50),
                'local_tax' => rand(5, 20),
                'international_shipping' => rand(20, 100),
                'international_tax' => rand(10, 30),
                'customs_clearance' => rand(15, 50),
                'service_fee' => rand(10, 50),
                'discount' => rand(0, 50),
                'note' => 'This is a note for order ' . $i,
                'status_type_id' => $statuses[array_rand($statuses)],
                'order_status_id' => $statuses[array_rand($statuses)],
                'created_from' => 'system',
                'created_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}
