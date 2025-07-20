<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;

// Halaman Welcome (opsional)
Route::get('/', function () {
    return view('welcome');
});

// ========================
// ROUTE LOGIN & REGISTER
// ========================

// Menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Menangani proses login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Menangani logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/logout-confirm', function () {
    return view('auth.logout-confirm');
})->name('logout.confirm');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Menampilkan form register
Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');

// Menangani proses register — ini penting diberi name('register')
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// ========================
// ROUTE YANG DIBUTUHKAN LOGIN
// ========================
Route::middleware(['auth'])->group(function () {
    // Halaman Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Halaman Produk
   Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
   // Hapus produk
    Route::delete('/produk/{id}', [ProdukController::class, 'hapus'])->name('produk.hapus');


    // Tambah produk
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');

    // Detail produk
    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

    Route::get('/kontak', function () { return view('kontak');})->name('kontak');

     
    
    
});