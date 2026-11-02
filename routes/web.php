<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('books.index');
    }

    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

// Halaman Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Proses Login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ROUTE YANG HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | BOOKS
    |--------------------------------------------------------------------------
    */

    Route::resource('books', BookController::class);


    /*
    |--------------------------------------------------------------------------
    | CATEGORIES
    |--------------------------------------------------------------------------
    */

    Route::resource('categories', CategoryController::class);


    /*
    |--------------------------------------------------------------------------
    | USERS - KHUSUS ADMIN
    |--------------------------------------------------------------------------
    |
    | User harus:
    | 1. Sudah login
    | 2. Memiliki Gate "manage-users"
    |
    */

    Route::middleware(['can:manage-users'])->group(function () {

        Route::resource('users', UserController::class);

    });

});