<?php

use App\Http\Controllers\api\APIController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/data', [APIController::class, 'index']);
    Route::post('/data', [APIController::class, 'store']);
    Route::put('/data/{id}', [APIController::class, 'update']);
    Route::delete('/data/{id}', [APIController::class, 'destroy']);
});
