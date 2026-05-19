@extends('layouts.admin')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mx-3 mt-3"
    role="alert"
    id="success-alert">

    <i class="fas fa-check-circle"></i>
    {{ session('success') }}

    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif
<h1 style="font-weight: bold;">User List</h1>

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
                                    <input class="form-control border-left-0 pl-0"
                                        type="search"
                                        name="search"
                                        id="searchInput"
                                        placeholder="Type email to search automatically..."
                                        aria-label="Search"
                                        value="{{ request('search') }}"
                                        autocomplete="off"
                                        style="height: 42px; font-size: 1rem;">

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
                                    @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email ?? 'N/A' }}</td>
                                        <td>{{ $user->phone ?? 'N/A' }}</td>
                                        <td>
                                            @if($user->google_id)
                                            <span class="badge badge-danger"><i class="fab fa-google"></i> Google</span>
                                            @else
                                            <span class="badge badge-info"><i class="fas fa-phone"></i> Phone</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at ? $user->created_at->format('d-M-Y') : 'N/A' }}</td>
                                        <td>
                                            <form action="{{ route('user.delete', $user->id) }}"
                                                method="POST"
                                                style="display:inline-block"
                                                onsubmit="return confirm('Are you sure to delete this user?')">

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm  btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No data found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer clearfix">
                            <div class="float-right">
                                {{-- រក្សាទុកពាក្យគន្លឹះស្វែងរកពេលប្តូរទំព័រ Pagination --}}
                                {{ $users->appends(['search' => request('search')])->links() }}
                            </div>
                        </div>
                    </div>
@endsection