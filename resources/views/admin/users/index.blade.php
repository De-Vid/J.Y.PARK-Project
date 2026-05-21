@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert" id="success-alert">

        <i class="fas fa-check-circle"></i>
        {{ session('success') }}

        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif
    <h2 style="font-weight: bold;">All Users</h2>
</div>

<div class="card">

    <!-- បន្ថែមប្រអប់ស្វែងរកនៅខាងឆ្វេងបង្អស់ (0px) និងមានតែ Icon មួយគត់ -->
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

    <div class="card-body p-0">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Login Type</th>
                    <th>Current Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->google_id)
                        <span class="badge badge-danger"><i class="fab fa-google"></i> Google</span>
                        @else
                        <span class="badge badge-info"><i class="fas fa-phone"></i> Phone</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge bg-primary">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td>
                        <!-- Update Button -->
                        <button type="button" class="btn btn-outline-success btn-sm shadow-sm px-3 rounded-pill"
                            data-bs-toggle="modal" data-bs-target="#updateRoleModal{{ $user->id }}">

                            <i class="fa-solid fa-pen-to-square me-1"></i>
                            Update
                        </button>

                        <!-- Premium Update Modal -->
                        <div class="modal fade" id="updateRoleModal{{ $user->id }}" tabindex="-1"
                            aria-labelledby="updateRoleModalLabel{{ $user->id }}" aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content border-0 overflow-hidden shadow-lg">

                                    <!-- Top Border -->
                                    <div class="bg-success" style="height: 6px;"></div>

                                    <!-- Body -->
                                    <div class="modal-body p-5 text-center">

                                        <!-- Icon -->
                                        <div class="mb-4">
                                            <div class="delete-icon-box mx-auto">

                                                <i class="fas fa-user-shield text-success" style="font-size: 45px;"></i>

                                            </div>
                                        </div>

                                        <!-- Title -->
                                        <h3 class="fw-bold text-dark mb-3">
                                            Update User Role?
                                        </h3>

                                        <!-- User -->
                                        <p class="text-muted mb-1">
                                            You are changing role for:
                                        </p>

                                        <h5 class="fw-semibold text-dark mb-4">
                                            {{ $user->name }}
                                        </h5>

                                        <!-- Form -->
                                        <form action="{{ route('admin.users.role', $user->id) }}" method="POST">

                                            @csrf

                                            <div class="mb-4">

                                                <select name="role" class="form-select shadow-sm rounded-pill px-4">

                                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>

                                                        👤 User
                                                    </option>

                                                    <option value="admin"
                                                        {{ $user->role == 'admin' ? 'selected' : '' }}>

                                                        🛡️ Admin
                                                    </option>

                                                </select>

                                            </div>

                                            <!-- Buttons -->
                                            <div class="d-flex justify-content-center gap-3">

                                                <button type="button"
                                                    class="btn btn-light px-4 rounded-pill fw-semibold"
                                                    data-bs-dismiss="modal">

                                                    Cancel
                                                </button>

                                                <button type="submit"
                                                    class="btn btn-success px-4 rounded-pill fw-semibold shadow-sm">

                                                    <i class="fas fa-check me-1"></i>
                                                    Confirm Update
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </td>
                    </form>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection