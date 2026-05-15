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

        <!-- Content -->
        <div class="content-wrapper p-3">

            <section class="content">

                <div class="container-fluid">

                    <!-- USER INFO CARD -->
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">User Profile</h3>
                        </div>

                        <div class="card-body">

                            @php
                            $user = Auth::user();
                            @endphp

                            <!-- PROFILE HEADER -->
                            <div class="bg-blue-50 rounded-lg p-6 mb-4">

                                <div class="d-flex align-items-center">

                                    <!-- AVATAR -->
                                    @if($user->avatar)
                                    <img src="{{ $user->avatar }}" class="img-circle elevation-2" width="70"
                                        height="70">
                                    @else
                                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded-circle"
                                        style="width:70px;height:70px;">
                                        <i class="fas fa-user fa-2x text-white"></i>
                                    </div>
                                    @endif

                                    <!-- INFO -->
                                    <div class="ml-3">

                                        <h4 class="mb-1">ស្វាគមន៍! {{ $user->name }}</h4>

                                        <div class="text-muted">

                                            @if($user->email)
                                            <p class="mb-1">
                                                <i class="fas fa-envelope"></i>
                                                Email: {{ $user->email }}
                                            </p>
                                            @endif

                                            @if($user->phone_number ?? false)
                                            <p class="mb-1">
                                                <i class="fas fa-phone"></i>
                                                លេខទូរស័ព្ទ: {{ $user->phone_number }}
                                            </p>
                                            @endif

                                            @if($user->google_id)
                                            <p class="mb-0 text-success">
                                                <i class="fab fa-google"></i>
                                                បានភ្ជាប់ជាមួយ Google
                                            </p>
                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- BASIC INFO -->
                            <div class="card">

                                <div class="card-body">

                                    <p><strong>Name:</strong> {{ $user->name }}</p>

                                    {{-- Login Type --}}
                                    @if(session('login_type') == 'email')
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                    @elseif(session('login_type') == 'phone')
                                    <p><strong>Phone:</strong> {{ $user->phone_number ?? 'N/A' }}</p>
                                    @elseif($user->google_id)
                                    <p><strong>Login:</strong> Google Account</p>
                                    @endif

                                    <p><strong>Role:</strong> {{ $user->role ?? 'User' }}</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </div>

    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>

</html>