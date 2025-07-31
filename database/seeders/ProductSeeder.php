<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            ['name' => 'Laptop', 'price' => 999.99, 'stock' => 10],
            ['name' => 'Phone', 'price' => 499.99, 'stock' => 20],
            ['name' => 'Tablet', 'price' => 299.99, 'stock' => 15],
        ]);
    }
}
