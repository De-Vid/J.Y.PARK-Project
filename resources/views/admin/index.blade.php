@extends('layouts.admin')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mx-3 mt-5" role="alert" id="success-alert">

    <i class="fas fa-check-circle"></i>
    {{ session('success') }}

    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif
<section class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1 style="font-weight: bold;">Admin List</h1>
        </div>
    </div>
</section>

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-end py-3">
        <form action="{{ url()->current() }}" method="GET" id="searchForm" class="w-100" style="max-width: 500px;">

            <div class="input-group shadow-sm">

                <div class="input-group-prepend">
                    <span class="input-group-text bg-white border-right-0 text-muted">
                        <i class="fas fa-search"></i>
                    </span>
                </div>

                <input class="form-control border-left-0 pl-0" type="search" name="search" id="searchInput"
                    placeholder="Type email to search automatically..." aria-label="Search"
                    value="{{ request('search') }}" autocomplete="off" style="height: 42px; font-size: 1rem;">

                @if(request('search'))
                <div class="input-group-append">
                    <a href="{{ url()->current() }}" class="btn btn-secondary d-flex align-items-center px-3"
                        title="Clear Search">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                @endif

            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="card-body p-0">

        <table class="table table-striped table-bordered">

            <thead class="table-dark">
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Login Type</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($admins as $admin)

                <tr>

                    <td>{{ $admin->id }}</td>

                    <td>{{ $admin->name }}</td>

                    <td>{{ $admin->email ?? 'N/A' }}</td>

                    <td>{{ $admin->phone ?? 'N/A' }}</td>

                    <td>
                        @if($admin->google_id)
                        <span class="badge badge-danger">
                            <i class="fab fa-google"></i> Google
                        </span>
                        @else
                        <span class="badge badge-info">
                            <i class="fas fa-phone"></i> Phone
                        </span>
                        @endif
                    </td>

                    <td>
                        {{ $admin->created_at ? $admin->created_at->format('d-M-Y') : 'N/A' }}
                    </td>
                    <td>
                        <!-- Delete Button -->
                        <button type="button" class="btn btn-outline-danger btn-sm rounded-circle shadow-sm"
                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $admin->id }}"
                            style="width:32px; height:32px;">

                            <i class="fas fa-trash-alt"></i>
                        </button>

                        <!-- Premium Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $admin->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $admin->id }}" aria-hidden="true">

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
                                            Delete Admin?
                                        </h3>

                                        <!-- Description -->
                                        <p class="text-muted mb-1">
                                            You are about to permanently delete:
                                        </p>

                                        <h5 class="fw-semibold text-dark mb-3">
                                            {{ $admin->name }}
                                        </h5>

                                        <p class="small text-secondary mb-4">
                                            This action cannot be undone.
                                        </p>

                                        <!-- Buttons -->
                                        <div class="d-flex justify-content-center gap-3">

                                            <button type="button" class="btn btn-light px-4 rounded-pill fw-semibold"
                                                data-bs-dismiss="modal">

                                                Cancel
                                            </button>

                                            <form action="{{ route('admin.delete', $admin->id) }}" method="POST">

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
                    <td colspan="6" class="text-center">
                        No data found
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>
    </div>

    <!-- Pagination -->
    <div class="card-footer clearfix">

        <div class="float-right">
            {{ $admins->appends([
                                'search' => request('search')
                            ])->links() }}
        </div>

    </div>

</div>

@endsection