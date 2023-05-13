<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\IkanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ambilPost', [IkanController::class, 'ambilSemuaPost']);
Route::get('/ikans/{id}', [IkanController::class, 'ambilPostSpesifik']);
Route::post('/ikans', [IkanController::class, 'tambahPost']);
Route::put('/ikans/{id}', [IkanController::class, 'ubahPost']);
Route::delete('/ikans/{id}', [IkanController::class, 'hapusPost']);
