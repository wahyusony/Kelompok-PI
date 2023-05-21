<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\IkanController;
use App\Http\Controllers\API\PemasokController;
use App\Http\Controllers\API\PelabuhanController;
use App\Http\Controllers\API\TransaksiController;
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

Route::post('/registrasi', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/ambilData', [IkanController::class, 'ambilSemuaData'])->middleware('auth:sanctum');
Route::get('/ikans/{id_ikan}', [IkanController::class, 'ambilDataSpesifik']);
Route::post('/ikans', [IkanController::class, 'tambahData']);
Route::put('/ikans/{id_ikan}', [IkanController::class, 'ubahData']);
Route::delete('/ikans/{id_ikan}', [IkanController::class, 'hapusData']);

Route::get('/semuaPemasok', [PemasokController::class, 'index'])->middleware('auth:sanctum');
Route::get('/pemasoks/{id_pemasok}', [PemasokController::class, 'getById']);
Route::post('/pemasoks', [PemasokController::class, 'tambahData']);
Route::put('/pemasoks/{id_pemasok}', [PemasokController::class, 'ubahData']);
Route::delete('/pemasoks/{id_pemasok}', [PemasokController::class, 'hapusData']);

Route::get('/semuaPelabuhan', [PelabuhanController::class, 'tampilSemuaPelabuhan'])->middleware('auth:sanctum');
Route::get('/pelabuhans/{id_pelabuhan}', [PelabuhanController::class, 'tampilById']);
Route::post('/pelabuhans', [PelabuhanController::class, 'tambahData']);
Route::put('/pelabuhans/{id_pelabuhan}', [PelabuhanController::class, 'updateData']);
Route::delete('/pelabuhans/{id_pelabuhan}', [PelabuhanController::class, 'destroyData']);

Route::get('/semuaTransaksi', [TransaksiController::class, 'tampilSemuaTransaksi'])->middleware('auth:sanctum');
Route::get('/transaksis/{id_transaksi}', [TransaksiController::class, 'tampilById']);
Route::post('/transaksis', [TransaksiController::class, 'tambahData']);
Route::put('/transaksis/{id_transaksi}', [TransaksiController::class, 'updateData']);
Route::delete('/transaksis/{id_transaksi}', [TransaksiController::class, 'destroyData']);