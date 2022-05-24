<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(PostController::class)->group(function () {
    Route::prefix('posts')->group(function () {
    Route::get('/', 'index')->name('posts.index');
    Route::get('/create', 'create');
    Route::post('/create', 'store')->name('posts.create');
    Route::get('/show/{post}', 'show')->name('posts.show');
    Route::get('/edit/{post}', 'edit')->name('posts.edit');
    Route::post('/edit/{post}', 'update');
    Route::get('/delete/{post}', 'destroy')->name('posts.delete');
});
});

require __DIR__.'/auth.php';
