<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WorkingJobController;

// Route::prefix('api')->group(function () {
    Route::prefix('jobs')->group(function () {
        Route::get('/', [WorkingJobController::class, 'index']);
        Route::get('{job}', [WorkingJobController::class, 'show']);
        Route::post('/', [WorkingJobController::class, 'store']);
        Route::put('{job}', [WorkingJobController::class, 'update']);
        Route::delete('{job}', [WorkingJobController::class, 'destroy']);
    });
// });
