<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $users = User::latest()->take(5)->get();
        $products = Product::with('categories')->latest()->take(5)->get();
        $categories = Category::withCount('products')->take(5)->get();
        $orders = Order::with('user')->latest()->take(15)->get();
        $orderItems = OrderItem::with(['order', 'product'])->latest()->take(5)->get();

        $stats = [
            'total_users' => User::count(),
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_orders' => Order::count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total'),
        ];

        return view('item.index', compact('users', 'products', 'categories', 'orders', 'orderItems', 'stats'));
    }
}
