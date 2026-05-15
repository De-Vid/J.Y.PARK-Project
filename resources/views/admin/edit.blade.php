<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Admin</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
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
                <span class="brand-text font-weight-light">
                    {{ Auth::user()->name ?? 'Admin' }}
                </span>
            </a>

            <div class="sidebar">
                @include('layouts.left_menu')
            </div>

        </aside>

        <!-- Content -->
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <h1>Add Admin</h1>
                </div>
            </section>

            <section class="content">

                <div class="container-fluid">

                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Create New Admin</h3>
                        </div>

                        <form action="{{ route('admin.update', $admin->id) }}" method="POST">

                            @csrf

                            <div class="card-body">

                                <!-- Success -->
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <!-- Errors -->
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif


                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $admin->email }}">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $admin->phone }}">
                                </div>

                                <button class="btn btn-success">
                                    Update
                                </button>

                                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                                    Back
                                </a>

                        </form>

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

</body>

</html>