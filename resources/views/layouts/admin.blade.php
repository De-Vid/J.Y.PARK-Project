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
    .delete-icon-box {
    width: 95px;
    height: 95px;
    border-radius: 50%;
    background: rgba(220, 53, 69, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    animation: pulse 1.8s infinite;
}

.delete-icon-box i {
    font-size: 40px;
    color: #dc3545;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.4);
    }

    70% {
        transform: scale(1.05);
        box-shadow: 0 0 0 18px rgba(220, 53, 69, 0);
    }

    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
    }
}

.modal-content {
    animation: smoothModal .25s ease;
}

@keyframes smoothModal {
    from {
        opacity: 0;
        transform: translateY(20px) scale(.97);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
.form-select {
    height: 50px;
    border-radius: 14px;
    border: 1px solid #e5e7eb;
    padding-left: 18px;
    padding-right: 45px;
    font-size: 15px;
    font-weight: 600;
    color: #212529;
    background-color: #fff;
    transition: all .25s ease;

    /* Custom Arrow */
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 5.646a.5.5 0 0 1 .708 0L8 11.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");

    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 16px;

    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;

    box-shadow: 0 4px 12px rgba(0, 0, 0, .04);
}

/* Hover */
.form-select:hover {
    border-color: #198754;
    box-shadow: 0 8px 20px rgba(25, 135, 84, .08);
}

/* Focus */
.form-select:focus {
    border-color: #198754;
    box-shadow: 0 0 0 .2rem rgba(25, 135, 84, .15);
    outline: none;
}

/* OPTION STYLE */
.form-select option {
    padding: 12px;
    font-weight: 500;
}

/* DARK OPTION SELECTED */
.form-select option:checked {
    background: #198754;
    color: #fff;
}

/* INSIDE MODAL */
.modal .form-select {
    background-color: #fdfdfd;
}

/* MOBILE */
@media(max-width:576px) {

    .form-select {
        height: 46px;
        font-size: 14px;
    }

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>

</html>