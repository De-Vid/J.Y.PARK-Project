<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthOtpController;

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\DashboardController;

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




// ------------------------ GOOGLE LOGIN ------------------------

Route::controller(GoogleAuthController::class)->group(function () {

    Route::get('/auth/google', 'redirectToGoogle')
        ->name('google.login');

    Route::get('/auth/google/callback', 'handleGoogleCallback')
        ->name('google.callback');

});


// ------------------------ EMAIL VERIFICATION ------------------------

// Notice Page
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    $request->fulfill();

    return redirect()->route('dashboard');

})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {

    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent successfully!');

})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// ------------------------ DASHBOARD ------------------------

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');