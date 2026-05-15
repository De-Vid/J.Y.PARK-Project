<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
    body {
        background: linear-gradient(135deg, #4e73df, #224abe);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
    }

    .login-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        background: transparent;
        border: none;
        text-align: center;
        padding-top: 30px;
    }

    .card-header h4 {
        font-weight: bold;
        color: #224abe;
    }

    .login-icon {
        width: 80px;
        height: 80px;
        background: #eef3ff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        margin-bottom: 15px;
        font-size: 35px;
        color: #224abe;
    }

    .form-label {
        font-weight: 600;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px;
        border: 1px solid #dfe3ee;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #4e73df;
    }

    .login-btn {
        background: linear-gradient(135deg, #4e73df, #224abe);
        border: none;
        border-radius: 12px;
        padding: 12px;
        transition: 0.3s;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .google-btn {
        transition: all 0.3s ease;
        background: #fff;
        border-radius: 12px;
    }

    .google-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        background: #f8f9fa;
    }

    .btn-outline-primary {
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.25);
    }

    .demo-box {
        background: #f8f9fc;
        border-radius: 12px;
        padding: 15px;
        font-size: 14px;
    }

    .divider {
        text-align: center;
        position: relative;
        margin: 25px 0;
    }

    .divider::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 1px;
        background: #ddd;
        top: 50%;
        left: 0;
    }

    .divider span {
        background: #fff;
        padding: 0 15px;
        position: relative;
        color: #999;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card login-card">

                    <div class="card-header">

                        <div class="login-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <h4>Welcome Back</h4>
                        <p class="text-muted">Login to your account</p>
                    </div>

                    <div class="card-body px-4 pb-4">

                        @if($errors->any())
                        <div class="alert alert-danger rounded-3">
                            @foreach($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-1"></i>
                                    Email
                                </label>

                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Enter your email" required>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-1"></i>
                                    Password
                                </label>

                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password" required>
                            </div>

                            <!-- Remember -->
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Remember me</label>
                                </div>

                                <a href="#" class="text-decoration-none small">
                                    Forgot Password?
                                </a>
                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold login-btn">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Login
                            </button>

                            <!-- Divider -->
                            <div class="divider">
                                <span>OR</span>
                            </div>

                            <!-- Login Options -->
                            <div class="row">

                                <!-- Phone Login -->
                                <div class="col-md-6 mb-2">
                                    <a href="{{ route('login-otp') }}"
                                        class="btn btn-outline-primary w-100 py-2 fw-semibold">

                                        <i class="fas fa-mobile-alt me-2"></i>
                                        Phone Login
                                    </a>
                                </div>

                                <!-- Google Login -->
                                <div class="col-md-6 mb-2">
                                    <a href="{{ route('google.login') }}"
                                        class="btn btn-light border w-100 py-2 fw-semibold google-btn">

                                        <i class="fab fa-google me-2 text-danger"></i>
                                        Google
                                    </a>
                                </div>

                            </div>

                        </form>

                        <!-- Demo Accounts -->
                        <!-- <div class="demo-box mt-4">

                            <h6 class="fw-bold mb-2">
                                <i class="fas fa-info-circle me-1"></i>
                                Demo Accounts
                            </h6>

                            <p class="mb-1">
                                <strong>Admin:</strong>
                                admin@example.com / password
                            </p>

                            <p class="mb-0">
                                <strong>User:</strong>
                                user@example.com / password
                            </p>

                        </div> -->

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>