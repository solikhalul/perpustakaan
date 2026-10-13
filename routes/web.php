<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return redirect()->route('books.index');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Categories
|--------------------------------------------------------------------------
*/

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');


/*
|--------------------------------------------------------------------------
| Members
|--------------------------------------------------------------------------
*/

Route::get('/members', [MemberController::class, 'index'])
    ->name('members.index');


/*
|--------------------------------------------------------------------------
| Books
|--------------------------------------------------------------------------
*/

Route::resource('books', BookController::class);