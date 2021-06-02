<?php

use App\Http\Controllers\RentalController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->prefix('v1')->group(function () {

    Route::get('vehicles', VehicleController::class);

    Route::post('vehicle/checkout', [RentalController::class, 'checkout']);
    Route::post('vehicle/checkin/{id}', [RentalController::class, 'checkin']);
});
