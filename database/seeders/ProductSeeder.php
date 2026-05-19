<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // លុប Product::truncate(); ចេញពីកន្លែងនេះ

        $products = [
            [
                'name' => 'iPhone 17 Pro',
                'description' => '128GB, Blue Titanium',
                'price' => 200,
                'image' => 'https://i.ebayimg.com/images/g/EDEAAeSwLb9owuv8/s-l1600.webp',
            ],
            // ... ទិន្នន័យផលិតផលផ្សេងទៀតរបស់អ្នក ...
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}