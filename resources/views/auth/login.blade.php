<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Animated Design</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden; /* ការពារកុំឱ្យឃើញ Scrollbar ពេលមាន Animation */
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            /* បន្ថែម Animate.css class នៅទីនេះ */
            --animate-duration: 0.8s; /* កំណត់រយៈពេល Animation */
        }
        
        .card-header {
            background: transparent;
            border-bottom: none;
            padding-top: 30px;
            text-align: center;
        }
        
        .card-header h4 {
            font-weight: 600;
            color: #333;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
            transition: all 0.3s ease; /* transition សម្រាប់ Hover/Focus */
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(118, 75, 162, 0.2);
            border-color: #764ba2;
            transform: scale(1.01); /* ពង្រីកបន្តិចពេល Focus */
        }
        
        .btn-primary {
            background-color: #764ba2;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #5a397a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
        }
        
        .btn-primary:active {
            transform: translateY(1px);
        }
        
        /* Delay សម្រាប់ Element ខាងក្នុង */
        .animate__animated {
            --animate-duration: 0.6s;
        }
        
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
        .delay-4 { animation-delay: 0.8s; }
        .delay-5 { animation-delay: 1.0s; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                
                <!-- បន្ថែម animate__animated animate__zoomIn សម្រាប់ Form ទាំងមូល -->
                <div class="card p-3 animate__animated animate__zoomIn">
                    <div class="card-header animate__animated animate__fadeInDown delay-1">
                        <h4>ចូលប្រើប្រាស់</h4>
                        <p class="text-muted small">សូមបញ្ចូលគណនីរបស់អ្នកដើម្បីបន្ត</p>
                    </div>
                    <div class="card-body">
                        
                        {{-- Laravel Error Handling --}}
                        @if($errors->any())
                            <div class="alert alert-danger animate__animated animate__shakeX">
                                @foreach($errors->all() as $error)
                                    <p class="mb-0 small">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <!-- បន្ថែម Animation Delay សម្រាប់ Input field នីមួយៗ -->
                            <div class="mb-3 animate__animated animate__fadeInUp delay-2">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="example@mail.com" required>
                            </div>
                            
                            <div class="mb-4 animate__animated animate__fadeInUp delay-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 shadow-sm animate__animated animate__fadeInUp delay-4">
                                ចូលប្រើប្រាស់
                            </button>
                        </form>

                        <div class="mt-4 text-center animate__animated animate__fadeInUp delay-5">
                            <p class="small text-muted">មិនទាន់មានគណនី? <a href="#" class="text-decoration-none" style="color: #764ba2; font-weight: 600;">ចុះឈ្មោះឥឡូវនេះ</a></p>
                        </div>
                    </div>
                </div>
                
                <p class="text-center mt-4 text-white-50 animate__animated animate__fadeIn delay-5">
                    <small>&copy; 2024 Your Company. All rights reserved.</small>
                </p>
                
            </div>
        </div>
    </div>
</body>
</html>