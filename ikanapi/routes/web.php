<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerateTokenController; // Tambahkan penggunaan namespace GenerateTokenController
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('index');
})->middleware('auth');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/generate-token', [GenerateTokenController::class, 'generateToken'])->name('generate.token');
Route::post('/generate-token', [App\Http\Controllers\GenerateTokenController::class, 'generateToken'])->name('generate.token');
Route::post('/generate-token', [GenerateTokenController::class, 'generateToken'])->name('generate.token');

Route::view('/ikan', 'ikan');
Route::view('/pelabuhan', 'pelabuhan');
Route::view('/token-api', 'token-api');




