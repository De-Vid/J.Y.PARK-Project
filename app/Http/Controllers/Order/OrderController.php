<?php

namespace App\Http\Controllers\Order;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Order::withCount('items');

        if (!empty($search)) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $orders = $query->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function check($id)
    {
        $order = Order::with('user')->findOrFail($id);
        $orderItems = \App\Models\OrderItem::where('order_id', $id)->with('product')->paginate(10);
        return view('admin.orders.check', compact('order', 'orderItems'));
    }
}
