@extends('layouts.admin')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert" id="success-alert">
    <i class="fas fa-check-circle"></i>
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif
<div class="px-3">
    <h2 class="m-0 font-weight-bold">Orders</h2>
</div>

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-end py-3">
        <form action="{{ url()->current() }}" method="GET" id="searchForm" class="w-100" style="max-width: 500px;">
            <div class="input-group shadow-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white border-right-0 text-muted">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
                <input class="form-control border-left-0 pl-0" type="search" name="search" id="searchInput" placeholder="Type email to search automatically..." aria-label="Search" value="{{ request('search') }}" autocomplete="off" style="height: 42px; font-size: 1rem;">

                @if(request('search'))
                <div class="input-group-append">
                    <a href="{{ url()->current() }}" class="btn btn-secondary d-flex align-items-center px-3" title="Clear Search">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                @endif
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>
                        @php
                        $badgeColor = match($order->status) {
                        'pending' => 'warning', // ពណ៌លឿង
                        'completed' => 'success', // ពណ៌បៃតង
                        'cancelled' => 'danger', // ពណ៌ក្រហម
                        default => 'secondary' // ពណ៌ប្រផេះ (ករណីផ្សេងទៀត)
                        };
                        @endphp

                        <span class="badge badge-{{ $badgeColor }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.orders.check', $order->id) }}" class="btn btn-sm btn-outline-success font-weight-bold px-3" title="View Details">
                            {{ $order->orderItems->count() }} {{ Str::plural('Item', $order->orderItems->count()) }}
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            {{-- រក្សាទុកពាក្យគន្លឹះស្វែងរកពេលប្តូរទំព័រ Pagination --}}
            {{ $orders->appends(['search' => request('search')])->links() }}
        </div>
    </div>
</div>

@endsection