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
<div class="d-flex justify-content-between align-items-center px-3">
    <h1 class="m-0 font-weight-bold">Product List</h1>
    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New
    </a>
</div>

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-end py-3">
        <form action="{{ url()->current() }}" method="GET" id="searchForm" class="w-100" style="max-width: 500px;"
            enctype="multipart/form-data">
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
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Categories</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset('image/' . $product->image) }}" width="80"></td>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @foreach($product->categories as $cat)
                        <span class="badge bg-secondary">{{ $cat->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <!-- Stock Button -->
                        <button type="button" class="btn btn-outline-primary btn-sm rounded-circle shadow-sm" data-bs-toggle="modal" data-bs-target="#stockModal{{ $product->id }}" style="width:32px; height:32px;">
                            <i class="fas fa-cubes"></i>
                        </button>

                        <!-- Premium Stock Modal -->
                        <div class="modal fade" id="stockModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 overflow-hidden shadow-lg">
                                    <div class="bg-primary" style="height:6px;"></div>
                                    <div class="modal-body p-5 text-center">
                                        <div class="mb-4">
                                            <div class="delete-icon-box mx-auto">
                                                <i class="fas fa-cubes text-primary" style="font-size:42px;"></i>
                                            </div>
                                        </div>
                                        <h3 class="fw-bold text-dark mb-3">
                                            Update Product Stock
                                        </h3>
                                        <p class="text-muted mb-1">
                                            Product:
                                        </p>
                                        <h5 class="fw-semibold mb-4">
                                            {{ $product->name }}
                                        </h5>
                                        <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            @foreach($product->categories as $category)
                                            <input type="hidden" name="categories[]" value="{{ $category->id }}">
                                            @endforeach
                                            <div class="mb-4">
                                                <input type="number" name="stock" value="{{ $product->stock }}" min="0" class="form-control text-center shadow-sm" placeholder="Enter stock" style="height:60px; border-radius:18px; font-size:22px; font-weight:700;">
                                            </div>
                                            <div class="d-flex justify-content-center gap-3">
                                                <button type="button" class="btn btn-light px-4 rounded-pill fw-semibold" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>

                                                <button type="submit" class="btn btn-primary px-4 rounded-pill fw-semibold shadow-sm">
                                                    <i class="fas fa-save me-1"></i>Update Stock
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- បន្ថែមប៊ូតុង Edit នេះ -->
                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-outline-success btn-sm rounded-circle shadow-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Delete Button -->
                        <button type="button" class="btn btn-outline-danger btn-sm rounded-circle shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}" style="width:32px; height:32px;">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                        <!-- Premium Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 overflow-hidden shadow-lg">

                                    <!-- Top Border -->
                                    <div class="bg-danger" style="height: 6px;"></div>

                                    <!-- Body -->
                                    <div class="modal-body p-5 text-center">

                                        <!-- Animated Icon -->
                                        <div class="mb-4">
                                            <div class="delete-icon-box mx-auto">
                                                <i class="fas fa-trash-alt"></i>
                                            </div>
                                        </div>

                                        <!-- Title -->
                                        <h3 class="fw-bold text-dark mb-3">
                                            Delete Product?
                                        </h3>

                                        <!-- Description -->
                                        <p class="text-muted mb-1">
                                            You are about to permanently delete:
                                        </p>

                                        <h5 class="fw-semibold text-dark mb-3">
                                            {{ $product->name }}
                                        </h5>

                                        <p class="small text-secondary mb-4">
                                            This action cannot be undone.
                                        </p>

                                        <!-- Buttons -->
                                        <div class="d-flex justify-content-center gap-3">

                                            <button type="button" class="btn btn-light px-4 rounded-pill fw-semibold" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger px-4 rounded-pill fw-semibold shadow-sm">
                                                    <i class="fas fa-trash me-1"></i>
                                                    Delete
                                                </button>
                                            </form>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
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
            {{ $products->appends(['search' => request('search')])->links() }}
        </div>
    </div>
</div>

<style>
    .delete-icon-box{
    width:95px;
    height:95px;
    border-radius:50%;
    background:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.modal-content{
    border-radius:24px;
    animation:zoomIn .25s ease;
}

@keyframes zoomIn{
    from{
        transform:scale(.9);
        opacity:0;
    }
    to{
        transform:scale(1);
        opacity:1;
    }
}
</style>
@endsection