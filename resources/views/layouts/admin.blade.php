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

</head>
<style>
    .pagination {
        margin-bottom: 0;
    }

    .page-item .page-link {
        border-radius: 10px;
        margin: 0 4px;
        border: none;
        color: #007bff;
        font-weight: 600;
        padding: 8px 14px;
        transition: 0.3s;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .page-item .page-link:hover {
        background: #007bff;
        color: #fff;
    }

    .page-item.active .page-link {
        background: #007bff;
        color: #fff;
        border: none;
    }

    .page-item.disabled .page-link {
        color: #999;
        background: #f1f1f1;
    }

    .card {
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    }

    .table thead th {
        background: #343a40;
        color: white;
        vertical-align: middle;
    }

    .btn {
        border-radius: 10px;
    }

    .input-group-text,
    .form-control {
        border-radius: 10px;
    }
</style>
<body class="hold-transition sidebar-mini layout-navbar-fixed">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            @include('layouts.navbar')

        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="#" class="brand-link text-center">
                <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
            </a>

            <div class="sidebar">

                @include('layouts.left_menu')
            </div>
        </aside>

        <!-- Content -->
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid"></div>
            </section>

            <section class="content">
                <div class="container-fluid">

                   @yield('content')

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