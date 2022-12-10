<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;

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
    return redirect('/movie');
});

Route::get('/movie', [MovieController::class, 'getMovieShow'])->name('movie.index');
Route::get('/movie/detail/{id}', [MovieController::class, 'showMovieById'])->name('movie.show');


Route::middleware('auth')->group(function () {
    Route::get('/movie/create', [MovieController::class, 'createMovie'])->name('movie.store');
    Route::post('/movie/create', [MovieController::class, 'createMoviePost']);
    
    Route::get('/movie/edit/{id}', [MovieController::class, 'editMovie'])->name('movie.edit');
    Route::put('/movie/edit/{id}', [MovieController::class, 'updateMovie']);

    Route::delete('/movie/delete/{id}', [MovieController::class, 'deleteMovie'])->name('movie.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
