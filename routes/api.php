<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwVenuesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/**
 * -------------------------------
 * Venue Management Routes
 * -------------------------------
 */
route::namespace('App\Http\Controllers\Owner\VenueManagement')
    ->group(function () {
        Route::post('/owner/venues', 'VenueController@store');
    });
