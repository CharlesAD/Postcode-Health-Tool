<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostcodeController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/postcode/{postcode}', [PostcodeController::class, 'lookup']);