@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center px-3 my-3">
    <!-- បង្ហាញលេខ ID របស់ Order នៅលើចំណងជើង -->
    <h1 class="m-0 font-weight-bold">Order Details</h1>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-danger">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
</div>

<div class="card">
    <!-- បង្ហាញព័ត៌មានសង្ខេបរបស់ Order នេះ -->


    <div class="card-body p-0">
        <table class="table table-striped table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Item ID</th>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orderItems as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>#{{ $item->order_id }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ $item->product->name ?? 'Deleted Product' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No items found in this order.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        <div class="card-header bg-light h5 text-right">
        <strong class="text-danger">Total Amount: ${{ number_format($order->total, 2) }} </strong> 
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            <!-- ឥឡូវនេះ links() នឹងដំណើរការធម្មតា ដោយមិនមាន error ទៀតទេ -->
            {{ $orderItems->links() }}
        </div>
    </div>
</div>

@endsection