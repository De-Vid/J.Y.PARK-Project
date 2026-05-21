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
    <h1 class="m-0 font-weight-bold">Categories</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New
    </a>
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Categories</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><span class="badge bg-primary p-2">{{ $category->products_count }}</span></td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                            class="btn btn-outline-success btn-sm rounded-circle shadow-sm"
                            title="Edit">

                            <i class="fas fa-edit"></i>
                        </a>
<!-- Delete Button -->
<button type="button"
    class="btn btn-outline-danger btn-sm rounded-circle shadow-sm"
    data-bs-toggle="modal"
    data-bs-target="#deleteCategoryModal{{ $category->id }}"
    title="Delete">

    <i class="fas fa-trash"></i>
</button>

<!-- Premium Delete Modal -->
<div class="modal fade"
    id="deleteCategoryModal{{ $category->id }}"
    tabindex="-1"
    aria-labelledby="deleteCategoryModalLabel{{ $category->id }}"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 overflow-hidden shadow-lg">

            <!-- Top Border -->
            <div class="bg-danger" style="height: 6px;"></div>

            <!-- Body -->
            <div class="modal-body p-5 text-center">

                <!-- Icon -->
                <div class="mb-4">

                    <div class="delete-icon-box mx-auto">

                        <i class="fas fa-trash-alt text-danger"
                            style="font-size: 42px;"></i>

                    </div>

                </div>

                <!-- Title -->
                <h3 class="fw-bold text-dark mb-3">
                    Delete Category?
                </h3>

                <!-- Description -->
                <p class="text-muted mb-1">
                    You are about to permanently delete:
                </p>

                <h5 class="fw-semibold text-dark mb-3">
                    {{ $category->name }}
                </h5>

                <p class="small text-secondary mb-4">
                    This action cannot be undone.
                </p>

                <!-- Buttons -->
                <div class="d-flex justify-content-center gap-3">

                    <button type="button"
                        class="btn btn-light px-4 rounded-pill fw-semibold"
                        data-bs-dismiss="modal">

                        Cancel
                    </button>

                    <form action="{{ route('admin.categories.delete', $category->id) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="btn btn-danger px-4 rounded-pill fw-semibold shadow-sm">

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
            {{ $categories->appends(['search' => request('search')])->links() }}
        </div>
    </div>
</div>

@endsection