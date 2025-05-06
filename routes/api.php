<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CountryConfigController;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['geolocation'])->apiResource('brands', BrandController::class);
Route::get('country-configs', [CountryConfigController::class, 'index']);