<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController as AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PegawaiController;
use App\Http\Middleware\CheckRole;

Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth:admin',CheckRole::class.':admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/dosens', DosenController::class);
    Route::resource('/pegawais', PegawaiController::class);
});
