<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Dashboard</title>

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


            <ul class="navbar-nav ml-auto">

                <li class="nav-item d-flex align-items-center mr-3">
                    <span>Welcome, {{ Auth::user()->name }}</span>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>

        </nav>

<div class="card-body">

    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>

    @if(session('login_type') == 'email')
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    @endif

    @if(session('login_type') == 'phone')
        <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
    @endif

    <p><strong>Role:</strong> {{ Auth::user()->role }}</p>

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