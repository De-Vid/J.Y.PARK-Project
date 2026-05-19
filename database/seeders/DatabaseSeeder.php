<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ១. បង្កើត Admin និង Regular User មុនគេបង្អស់
        $this->call([
            UsersTableSeeder::class,
        ]);

        // ២. បង្កើត Test User ម្នាក់ទៀត
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // ៣. បង្កើត Users ផ្សេងទៀតចំនួន ១០ នាក់តាម Factory
        $users = User::factory(10)->create();
        
        // បញ្ចូល Test User ទៅក្នុងបញ្ជី Users ដែរដើម្បីយកទៅបង្កើត Orders ជាមួយគ្នា
        $users->push($testUser); 
        
        // ៤. បង្កើត Categories
        $categories = [
            'Electronics', 'Clothing', 'Books', 'Home & Garden', 'Sports',
            'Toys', 'Health & Beauty', 'Automotive', 'Food', 'Jewelry'
        ];
        
        foreach ($categories as $catName) {
            Category::create(['name' => $catName]);
        }
        $allCategories = Category::all();

        // ៥. ហៅ ProductSeeder ឱ្យបង្កើតផលិតផលចម្បងៗ (iPhone, AirPods...) មុននឹងបង្កើត Order
        $this->call([
            ProductSeeder::class,
        ]);
        
        // ៦. បង្កើតផលិតផលបន្ថែមចំនួន ៥០ ទៀតតាម Factory (ប្រសិនបើចង់បាន បើមិនចង់បានអាចលុបបន្ទាត់នេះចេញ)
        Product::factory(50)->create();
        
        // ៧. ចាប់ផ្តើមភ្ជាប់ Categories ទៅកាន់ Products ទាំងអស់ដែលមាននៅក្នុង Database
        $products = Product::all();
        foreach ($products as $product) {
            $randomCategories = $allCategories->random(rand(1, 3));
            $product->categories()->attach($randomCategories);
        }
        
        // ៨. បង្កើត Orders និង OrderItems (មានសុវត្ថិភាពខ្ពស់ព្រោះមាន Products រួចជាស្រេច)
        foreach ($users as $user) {
            $numOrders = rand(1, 5);
            for ($i = 0; $i < $numOrders; $i++) {
                $order = Order::create([
                    'user_id' => $user->id,
                    'total' => 0,
                    'status' => collect(['pending', 'completed', 'cancelled'])->random(),
                    'created_at' => now()->subDays(rand(1, 30))
                ]);
                
                $orderItems = [];
                $total = 0;
                $numItems = rand(1, 4);
                
                for ($j = 0; $j < $numItems; $j++) {
                    $product = $products->random();
                    $quantity = rand(1, 3);
                    $price = $product->price;
                    $subtotal = $quantity * $price;
                    $total += $subtotal;
                    
                    $orderItems[] = [
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'price' => $price,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }
                
                OrderItem::insert($orderItems);
                $order->update(['total' => $total]);
            }
        }
    }
}