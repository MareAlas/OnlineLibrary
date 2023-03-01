<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('librarian')->middleware(['auth', 'isLibrarian'])->group(function(){

    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'] );

    Route::controller(App\Http\Controllers\Librarian\AuthorController::class)->group(function () {
        Route::get('/authors', 'index');
        Route::get('/authors/create', 'create');
        Route::post('/authors', 'store');
        Route::get('/authors/{author}/edit', 'edit');
        Route::put('/authors/{author}', 'update');
        Route::get('/authors/{author}/delete', 'destroy');
    });

    Route::controller(App\Http\Controllers\Librarian\BookController::class)->group(function () {
        Route::get('/books', 'index');
        Route::get('/books/create', 'create');
        Route::post('/books', 'store');
        Route::get('/books/{book}/edit', 'edit');
        Route::put('/books/{book}', 'update');
        Route::get('/books/{book_id}/delete', 'destroy');
    });

    Route::controller(App\Http\Controllers\Librarian\UsersController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user}/edit', 'edit');
        Route::put('/users/{user}', 'update');
        Route::get('/users/{user}/delete', 'destroy');
    });
});