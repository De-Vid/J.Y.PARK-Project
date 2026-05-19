<?php

namespace App\Http\Controllers\Order;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = OrderItem::with(['order', 'product']);

        if (!empty($search)) {
            $query->whereHas('product', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            });
        }

        $orderItems = $query->paginate(10);

        return view('admin.orders-item.index', compact('orderItems'));
    }
}
