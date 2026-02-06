<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;

Route::get('/login', function () {
    return view('login');
});

// Rute untuk memproses form login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');


// Rute logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');

Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {

    $user = User::findOrFail($id);

    // Validasi hash email
    if (! hash_equals(
        sha1($user->getEmailForVerification()),
        $hash
    )) {
        abort(403, 'Link verifikasi tidak valid.');
    }

    if (! $user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
    }

    return redirect('/login')->with(
        'success',
        'Email berhasil diverifikasi, silakan login.'
    );

})->name('verification.verify');

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
    
    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/update1', [ProfileController::class, 'update1'])->name('profile.update1');
        Route::post('/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
    });
});