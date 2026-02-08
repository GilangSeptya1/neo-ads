<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\AccountController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;

Route::get('/', [AuthController::class, 'showLogin'])->name('home');

// Rute untuk memproses form login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Rute logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Link verifikasi telah dikirim ulang.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/auth/google', [AuthController::class, 'redirectGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'callbackGoogle']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Iklan Routes
    Route::prefix('iklan')->group(function () {
        Route::get('/', [IklanController::class, 'index'])->name('iklan.index');
        Route::get('/create', [IklanController::class, 'create'])->name('iklan.create');
        Route::post('/store', [IklanController::class, 'store'])->name('iklan.store');
        Route::get('/detail/{id}', [IklanController::class, 'show'])->name('iklan.show');
        Route::post('/detail/{id}/upload-stiker', [IklanController::class, 'uploadStiker'])
    ->name('iklan.upload-stiker');

    });
    
    // Pembayaran Routes
    Route::prefix('pembayaran')->group(function () { 
        Route::get('/', [PembayaranController::class, 'index'])->name('pembayaran.index');
    });
    
    // Customer Profile Routes
    Route::prefix('customer-profile')
        ->name('customer-profile.')
        ->controller(CustomerProfileController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/update', 'update')->name('update');
            Route::put('/contact', 'updateContact')->name('update-contact');
        });

    Route::prefix('profile')
        ->name('profile.')
        ->controller(AccountController::class)
        ->group(function () {
            Route::post('/photo', 'updatePhoto')->name('update-photo');
            Route::get('/change-password', 'index')->name('index');
            Route::post('/change-password', 'update')->name('update-password');
        });
});