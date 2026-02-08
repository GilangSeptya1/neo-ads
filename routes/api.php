<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

Route::prefix('locations')
    ->controller(LocationController::class)
    ->middleware('throttle:60,1')
    ->group(function () {
        Route::get('/provinces', 'provinces');
        Route::get('/cities', 'cities');
        Route::get('/districts', 'districts');
        Route::get('/subdistricts', 'subdistricts');
    });