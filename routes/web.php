<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

// Menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Memproses login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Memproses logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| HALAMAN BUKU
|--------------------------------------------------------------------------
*/

// Semua halaman buku hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {

    Route::resource('books', BookController::class);

});