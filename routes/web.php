<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PaketController;
use Illuminate\Support\Facades\Route;

// =====================
// AUTH (LOGIN / REGISTER / LOGOUT)
// =====================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =====================
// DASHBOARD
// =====================
Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// =====================
// ROLE: ADMIN
// =====================

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('clients', ClientController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
});

// =====================
// ROLE: ADMIN + STAFF (PEMBAYARAN)
// =====================

Route::middleware(['auth', 'role:admin|staff'])->group(function () {
    Route::resource('payments', PaymentController::class);
});

// =====================
// ROLE: ADMIN + FINANCE
// =====================

Route::middleware(['auth', 'role:admin|finance'])->group(function () {
    Route::get('/finance', [FinanceController::class, 'index'])->name('finance.index');
});

// detail pembayaran per client
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/clients/{id}/payments', [PaymentController::class, 'showByClient'])
        ->name('clients.payments');
});

// paket
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('paket', PaketController::class);
});
