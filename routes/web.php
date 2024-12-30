<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostcodeController;

Route::get('/', function () {
    return view('health');
});


Route::get('/postcode/{postcode}', [PostcodeController::class, 'lookup']);