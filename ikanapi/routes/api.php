<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\IkanController;
use App\Http\Controllers\API\JenisIkanController;
use App\Http\Controllers\API\PelabuhanController;
use App\Http\Controllers\GenerateTokenController;
use App\Http\Controllers\API\AuthController;

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


Route::post('/generate-token', [GenerateTokenController::class, 'generateToken'])->middleware('auth:api');


Route::post('/registrasi', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/ambilData', [IkanController::class, 'ambilSemuaData'])->middleware('auth:sanctum');
Route::get('/ikans/{id}', [IkanController::class, 'ambilDataSpesifik']);
Route::post('/ikans', [IkanController::class, 'tambahData']);
Route::put('/ikans/{id}', [IkanController::class, 'ubahData']);
Route::delete('/ikans/{id}', [IkanController::class, 'hapusData']);

Route::get('/semuaJenisIkan', [JenisIkanController::class, 'index'])->middleware('auth:sanctum');
Route::get('/jenis_ikans/{id_jenis_ikan}', [JenisIkanController::class, 'getById']);
Route::post('/jenis_ikans', [JenisIkanController::class, 'tambahData']);
Route::put('/jenis_ikans/{id_jenis_ikan}', [JenisIkanController::class, 'ubahData']);
Route::delete('/jenis_ikans/{id_jenis_ikan}', [JenisIkanController::class, 'hapusData']);

Route::get('/semuaPelabuhan', [PelabuhanController::class, 'tampilSemuaPelabuhan'])->middleware('auth:sanctum');
Route::get('/pelabuhans/{id_pelabuhan}', [PelabuhanController::class, 'tampilById']);
Route::post('/pelabuhans', [PelabuhanController::class, 'tambahData']);
Route::put('/pelabuhans/{id_pelabuhan}', [PelabuhanController::class, 'updateData']);
Route::delete('/pelabuhans/{id_pelabuhan}', [PelabuhanController::class, 'destroyData']);


