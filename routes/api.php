<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\JenisIkanController;
use App\Http\Controllers\PelabuhanController;
use App\Http\Controllers\Autentikasi;

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

Route::post('/registrasi', [Autentikasi::class, 'register']);
Route::post('/login', [Autentikasi::class, 'login']);
Route::post('/logout', [Autentikasi::class, 'logout'])->middleware('auth:sanctum');


Route::get('/ikans', [IkanController::class, 'index']);
Route::get('/ikans/id={id}', [IkanController::class, 'getById']);


Route::get('/jenis-ikans', [JenisIkanController::class, 'index']);
Route::get('/jenis-ikans/id={id}', [JenisIkanController::class, 'getById']);

Route::get('/pelabuhans', [PelabuhanController::class, 'index']);
Route::get('/pelabuhans/id={id}', [PelabuhanController::class, 'getById']);



