<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// SEMENTARA: diganti ProductCatalogController di M4
Route::get('/', fn () => view('layouts.app'))->name('shop.index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// SEMENTARA: diganti DashboardController di M7
Route::get('/admin', fn () => 'Dashboard admin (sementara)')
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');