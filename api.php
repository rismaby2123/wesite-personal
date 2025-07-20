<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;

// Route untuk register
Route::post('/register', [AuthController::class, 'register']);

// Route untuk login
Route::post('/login', [AuthController::class, 'login']);

// Route untuk ambil daftar produk (tanpa login)
Route::get('/produk', [ProductController::class, 'index']);

// Route untuk ambil detail produk (optional)
Route::get('/produk/{id}', [ProductController::class, 'show']);
