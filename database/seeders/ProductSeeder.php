<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get categories
        $zelligeCat = Category::where('slug', 'zellige')->first();
        $tablesCat = Category::where('slug', 'tables')->first();
        $chairsCat = Category::where('slug', 'chairs')->first();
        $mosaicCat = Category::where('slug', 'mosaic-fountains')->first();

        // Create Products and attach categories
        $product1 = Product::create([
            'name' => 'Classic Zellige Tile',
            'description' => 'Handmade Moroccan Zellige tile, perfect for kitchens and bathrooms.',
            'price' => 75.50,
        ]);
        $product1->images()->create(['image_path' => 'seed/zellige_classic.jpg']);
        if ($zelligeCat) {
            $product1->categories()->attach($zelligeCat->id);
        }

        $product2 = Product::create([
            'name' => 'Travertine Coffee Table',
            'description' => 'Elegant and modern coffee table made from high-quality travertine.',
            'price' => 450.00,
        ]);
        $product2->images()->create(['image_path' => 'seed/travertine_table.jpg']);
        if ($tablesCat) {
            $product2->categories()->attach($tablesCat->id);
        }

        $product3 = Product::create([
            'name' => 'Wrought Iron Stool',
            'description' => 'Artisanal wrought iron stool with a comfortable cushion.',
            'price' => 120.00,
        ]);
        $product3->images()->create(['image_path' => 'seed/iron_stool.jpg']);
        if ($chairsCat) {
            $product3->categories()->attach($chairsCat->id);
        }

        $product4 = Product::create([
            'name' => 'Andalusian Mosaic Fountain',
            'description' => 'A beautiful wall-mounted mosaic fountain with traditional Andalusian patterns.',
            'price' => 1250.00,
        ]);
        $product4->images()->create(['image_path' => 'seed/mosaic_fountain.jpg']);
        if ($mosaicCat) {
            $product4->categories()->attach($mosaicCat->id);
        }
    }
}
