<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $customers = [];

        $customers[] = [
            'name' => 'test customer',
            'email' => 'test@email.com',
            'phone_number' => '0790111522',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // for ($i = 0; $i < 5; $i++) {
        //     $customers[] = [
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'password' => Hash::make('123456'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        DB::table('customers')->insert($customers);

    }
}
