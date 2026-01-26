<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfileController;

Route::get('/login', function () {
    return view('login');
});

// Rute untuk memproses form login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


// Rute logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/auth/google', [AuthController::class, 'redirectGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'callbackGoogle']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Iklan Routes
    Route::prefix('iklan')->group(function () {
        Route::get('/', [IklanController::class, 'index'])->name('iklan.index');
        Route::get('/create', [IklanController::class, 'create'])->name('iklan.create');
        Route::post('/store', [IklanController::class, 'store'])->name('iklan.store');
    });
    
    // Pembayaran Routes
    Route::prefix('pembayaran')->group(function () { 
        Route::get('/', [PembayaranController::class, 'index'])->name('pembayaran.index');
    });
    
    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/update1', [ProfileController::class, 'update1'])->name('profile.update1');
    });
});