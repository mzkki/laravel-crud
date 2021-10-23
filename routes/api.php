<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\FotoController;
use App\Http\Controllers\AuthController;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::middleware(['auth:api'])->group(function () {
});

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
