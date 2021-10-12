<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\FotoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('albums', AlbumController::class);
Route::get('/albums', [AlbumController::class, 'index']);
Route::post('/albums/store', [AlbumController::class, 'store']);
Route::get('/album/{id}', [AlbumController::class, 'show']);
Route::put('/album/{id}/update', [AlbumController::class, 'update']);
Route::delete('/album/{id}/destroy', [AlbumController::class, 'destroy']);

Route::get('/fotos', [FotoController::class, 'index']);
Route::post('/foto/store', [FotoController::class, 'store']);
Route::get('/foto/{id}', [FotoController::class, 'show']);
Route::put('/foto/{id}/update', [FotoController::class, 'update']);
Route::delete('/foto/{id}/destroy', [FotoController::class, 'destroy']);
