<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkanController;

Route::get('/ikan', function () {
    $ikanList = App\Models\Ikan::all();
    return view('ikan', compact('ikanList'));
});

