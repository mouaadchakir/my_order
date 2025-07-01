<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Classic Zellige Tile',
            'description' => 'Handmade Moroccan Zellige tile, perfect for kitchens and bathrooms.',
            'price' => 75.50,
            'image' => 'images/zellige_classic.jpg'
        ]);

        Product::create([
            'name' => 'Modern Subway Tile',
            'description' => 'Sleek and modern subway tiles for a clean, contemporary look.',
            'price' => 45.00,
            'image' => 'images/subway_modern.jpg'
        ]);

        Product::create([
            'name' => 'Rustic Terracotta Tile',
            'description' => 'Warm and rustic terracotta tiles, ideal for a Mediterranean feel.',
            'price' => 60.00,
            'image' => 'images/terracotta_rustic.jpg'
        ]);
    }
}
