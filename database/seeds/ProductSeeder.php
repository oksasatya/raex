<?php

namespace Database\Seeders;

use App\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'makanan 1',
            'description' => 'makanan 1',
            'image' => 'assets/images/raex/makanan 1.jpeg',
            'price' => 75000,
            'category' => 'Food'
        ]);

        Product::create([
            'name' => 'makanan 2',
            'description' => 'makanan 2',
            'image' => 'assets/images/raex/makanan 2.jpeg',
            'price' => 85000,
            'category' => 'Food'
        ]);

        Product::create([
            'name' => 'turtle 1',
            'description' => 'turtle 1',
            'image' => 'assets/images/raex/turtle 1.jpeg',
            'price' => 95000,
            'category' => 'Turtle'
        ]);

        Product::create([
            'name' => 'turtle 2',
            'description' => 'turtle 2',
            'image' => 'assets/images/raex/turtle 2.jpeg',
            'price' => 100000,
            'category' => 'Turtle'
        ]);
    }
}