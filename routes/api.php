<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkanController;

Route::get('/ikan', [IkanController::class, 'index']);
Route::get('/ikan/{id}', [IkanController::class, 'show']);
Route::post('/ikan', [IkanController::class, 'store']);
Route::put('/ikan/{id}', [IkanController::class, 'update']);
Route::delete('/ikan/{id}', [IkanController::class, 'destroy']);
