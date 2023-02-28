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

        Route::controller(App\Http\Controllers\Librarian\AuthorController::class)->group(function () {
        Route::get('/authors', 'index');
        Route::get('/authors/create', 'create');
        Route::post('/authors', 'store');
        Route::get('/authors/{author}/edit', 'edit');
        Route::put('/authors/{author}', 'update');
        Route::get('/authors/{author}/delete', 'destroy');
    });

});