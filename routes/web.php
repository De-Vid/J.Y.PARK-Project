<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserTotalController;
use App\Http\Controllers\AuthOtpController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;

// Public routes

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User routes
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// --------------------------------

Route::get('/login-otp', [AuthOtpController::class, 'showLoginForm'])->name('login-otp');
Route::post('/send-otp', [AuthOtpController::class, 'sendOtp'])->name('send.otp');
Route::get('/verify-otp', [AuthOtpController::class, 'showVerifyForm'])->name('verify.otp');
Route::post('/verify-otp', [AuthOtpController::class, 'verifyOtp'])->name('verify.otp.submit');
Route::post('/logout', [AuthOtpController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// ------------------------ GOOGLE LOGIN ------------------------

Route::controller(GoogleAuthController::class)->group(function () {

    Route::get('/auth/google', 'redirectToGoogle')
        ->name('google.login');

    Route::get('/auth/google/callback', 'handleGoogleCallback')
        ->name('google.callback');
});

// ------------------------ EMAIL VERIFICATION ------------------------

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent successfully!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// ------------------------ DASHBOARD ------------------------
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
// ------------------------ END DASHBOARD ------------------------

// ------------------------ Add Admin & User ------------------------
Route::prefix('admin')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    // DELETE
    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
});

Route::prefix('user')->group(function () {
    Route::get('/index', [UserTotalController::class, 'index'])->name('user.index');
    Route::delete('/delete/{id}', [UserTotalController::class, 'destroy'])->name('user.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{id}/role', [UserController::class, 'updateRole'])->name('admin.users.role');
});
// ------------------------ END Admin ------------------------

// Route::get('/', function () {
//     return view('welcome');
// });

// ------------------------ Product ------------------------
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/checkout/{id}', [PaymentController::class, 'checkout'])->middleware('auth')->name('checkout');
Route::get('/verify', [PaymentController::class, 'verifyForm'])->name('verify.form');
Route::post('/verify', [PaymentController::class, 'verifyTransaction'])->name('verify.transaction');
Route::get('/payments/result', [PaymentController::class, 'verifyTransaction'])->name('payments.result');
// ------------------------ End Product ------------------------