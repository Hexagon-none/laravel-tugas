<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\HomeController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    // Dashboard utama
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    // Halaman Data Kelas
    Route::get('/kelas', function () {
        return view('kelas');
    })->name('kelas');

    // Unduh PDF Kelas
    Route::get('/kelas-pdf', [KelasController::class, 'downloadPDF'])->name('kelas.pdf');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
