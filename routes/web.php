<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengeluaranController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Dashboard
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('clients', ClientController::class);
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
//Route::get('/payments/create/{client_id}', [PaymentController::class, 'create'])->name('payments.create');
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');

Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/finance', [FinanceController::class, 'index'])->name('finance.index');
Route::get('/clients/{id}/payments', [PaymentController::class, 'showByClient'])->name('clients.payments');
Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');
Route::post('/billing/filter', [BillingController::class, 'filter'])->name('billing.filter');
Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
// Modul Pengeluaran
Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
Route::get('/pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
Route::post('/pengeluaran/store', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');