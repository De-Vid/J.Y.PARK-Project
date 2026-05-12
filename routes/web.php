<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthOtpController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

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
    // Total Dashboard
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