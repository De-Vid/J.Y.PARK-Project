<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        .pagination {
            margin-bottom: 0;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('layouts.navbar')
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link text-center">
                <span class="brand-text font-weight-light">{{ Auth::user()->name ?? 'User' }}</span>
            </a>
            <div class="sidebar">
                @include('layouts.left_menu')
            </div>
        </aside>

        <!-- Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
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
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
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

                                                <button class="btn btn-sm btn-danger" title="Delete">
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
                </div>
            </section>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <!-- កូដ JavaScript សម្រាប់ដំណើរការ Auto Search -->
    <script>
        $(document).ready(function() {
            let timer;
            $('#searchInput').on('input', function() {
                clearTimeout(timer);
                timer = setTimeout(function() {
                    $('#searchForm').submit();
                }, 500);
            });

            // រក្សាទីតាំងកូនកណ្តុរ (Cursor) ឱ្យនៅចុងបញ្ចប់ពេល Web ទាញទិន្នន័យថ្មី
            let input = $('#searchInput');
            let strLength = input.val().length;
            if (strLength > 0) {
                input.focus();
                input[0].setSelectionRange(strLength, strLength);
            }
        });
            setTimeout(function () {
        let alertBox = document.getElementById('success-alert');

        if (alertBox) {
            alertBox.classList.remove('show');

            setTimeout(() => {
                alertBox.remove();
            }, 500);
        }
    }, 3000); // 7 seconds
    </script>
</body>

</html>