<?php

use Database\Seeders\UserSeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CostSeeder;
use Database\Seeders\ProvinceSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call([
            UserSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            // CostSeeder::class,
            ProductSeeder::class,
        ]);
    }
}