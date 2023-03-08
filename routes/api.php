<?php

use App\Http\Controllers\Api\V1\AppointmentController;
use App\Http\Controllers\Api\V1\CustomerController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('appointments', AppointmentController::class);
    Route::apiResource('customers', CustomerController::class);
});
