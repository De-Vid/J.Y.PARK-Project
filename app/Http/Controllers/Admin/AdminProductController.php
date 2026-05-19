<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Product::withCount('categories');

        if (!empty($search)) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $products = $query->paginate(10);

        return view('admin.product.index', compact('products'));
    }
}
