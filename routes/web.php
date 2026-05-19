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
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\OrderItemController;

Route::get('/item', [ItemController::class, 'index'])->name('item.index');
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
    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
});

Route::prefix('user')->group(function () {
    Route::get('/index', [UserTotalController::class, 'index'])->name('user.index');
    Route::delete('/delete/{id}', [UserTotalController::class, 'destroy'])->name('user.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{id}/role', [OrderItemController::class, 'updateRole'])->name('admin.users.role');
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

// ------------------------ Admin Cayegories ------------------------
Route::prefix('admin')->group(function () {
    Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('admin.categories.delete');
});
// ------------------------ End  Admin Cayegories ------------------------

// ------------------------ Admin Cayegories ------------------------
Route::prefix('admin')->group(function () {
    Route::get('/product', [AdminProductController::class, 'index'])->name('admin.product.index');
});
// ------------------------ End  Admin Cayegories ------------------------

// ------------------------ Admin Cayegories ------------------------
Route::prefix('admin')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
});
// ------------------------ End  Admin Cayegories ------------------------

// ------------------------ Admin Cayegories ------------------------
Route::prefix('admin')->group(function () {
    Route::get('/orders-item', [OrderItemController::class, 'index'])->name('admin.orders-item.index');
});
// ------------------------ End  Admin Cayegories ------------------------