<?php


use App\Http\Controllers\GenerateTokenController; // Tambahkan penggunaan namespace GenerateTokenController
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\PelabuhanController;
use App\Http\Controllers\API\TransaksiController;
use Illuminate\Support\Facades\Route;
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






Route::get('/home', [HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/ikan', 'ikan');
Route::view('/pelabuhan', 'pelabuhan');
Route::view('/token-api', 'token-api');

Route::post('/generate-token', [GenerateTokenController::class, 'generateToken'])->name('generate.token');
Route::get('/show-token', [GenerateTokenController::class, 'showToken'])->name('show.token');
Route::delete('/delete-token', [GenerateTokenController::class, 'deleteToken'])->name('delete.token');

Route::get('/pelabuhans', [PelabuhanController::class, 'index']);
Route::get('/transaksis', [TransaksiController::class, 'index']);



