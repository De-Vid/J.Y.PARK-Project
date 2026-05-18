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
        Product::truncate();

        $products = [

            [
                'name' => 'iPhone 17 Pro',
                'description' => '128GB, Blue Titanium',
                'price' => 200,
                'image' => 'https://i.ebayimg.com/images/g/EDEAAeSwLb9owuv8/s-l1600.webp',
            ],

            [
                'name' => 'AirPods Pro 3',
                'description' => 'Wireless earphones with noise cancelling',
                'price' => 150,
                'image' => 'https://sm.mashable.com/t/mashable_sea/article/a/appleairp/apple-airpods-pro-3-every-single-thing-we-know-so-far_uj6k.1248.jpg',
            ],

            [
                'name' => 'Samsung Galaxy S25',
                'description' => '256GB, Phantom Black',
                'price' => 180,
                'image' => 'https://images.samsung.com/is/image/samsung/p6pim/levant/2401/gallery/levant-galaxy-s24-s928-sm-s928bzkgmea-thumb-539573166',
            ],

            [
                'name' => 'MacBook Pro M4',
                'description' => '16-inch, 512GB SSD',
                'price' => 450,
                'image' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/mbp16-spaceblack-gallery1-202410',
            ],

            [
                'name' => 'Apple Watch Ultra',
                'description' => '49mm Titanium Case',
                'price' => 250,
                'image' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/watch-ultra-2-202409',
            ],

            [
                'name' => 'iPad Pro M4',
                'description' => '11-inch WiFi 256GB',
                'price' => 300,
                'image' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/ipad-pro-model-select-gallery',
            ],

            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Noise Cancelling Headphones',
                'price' => 120,
                'image' => 'https://m.media-amazon.com/images/I/61vIICn2AEL._AC_SL1500_.jpg',
            ],

            [
                'name' => 'PlayStation 5',
                'description' => 'Sony PS5 Console',
                'price' => 500,
                'image' => 'https://m.media-amazon.com/images/I/619BkvKW35L._SL1500_.jpg',
            ],

            [
                'name' => 'DJI Mini 4 Pro',
                'description' => '4K Camera Drone',
                'price' => 600,
                'image' => 'https://m.media-amazon.com/images/I/61k8lRXw+7L._AC_SL1500_.jpg',
            ],

            [
                'name' => 'Canon EOS R6',
                'description' => 'Mirrorless Camera',
                'price' => 700,
                'image' => 'https://m.media-amazon.com/images/I/71l7J6Ht9-L._AC_SL1500_.jpg',
            ],

        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}