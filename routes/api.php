<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Public API for Delhivery rates (no auth for checkout usage)
Route::get('/delhivery/rates', [\App\Http\Controllers\DelhiveryController::class, 'getRates']);

// API to get all available shipping options for checkout
Route::get('/delhivery/shipping-options', [\App\Http\Controllers\DelhiveryController::class, 'getShippingOptions']);