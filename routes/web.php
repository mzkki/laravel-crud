<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
use Illuminate\Support\Facades\Route;

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
})->name('home');



Route::get('/foto', [FotoController::class, 'index'])->name('foto.index');
Route::get('/foto/create', [FotoController::class, 'create'])->name('foto.create');
Route::post('/foto', [FotoController::class, 'store'])->name('foto.store');
Route::get('/foto/{id}', [FotoController::class, 'show'])->name('foto.show');
Route::get('/foto/{id}/edit', [FotoController::class, 'edit'])->name('foto.edit');
Route::put('/foto{id}', [FotoController::class, 'update'])->name('foto.update');
Route::delete('/foto/{id}', [FotoController::class, 'destroy'])->name('foto.destroy');

Route::resource('albums', AlbumController::class);
