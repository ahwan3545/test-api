<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StatusTypesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(AdvertismentsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
    }
}
