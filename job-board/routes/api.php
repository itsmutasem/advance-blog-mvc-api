<?php

use App\Http\Controllers\api\v1\AuthApiController;
use App\Http\Controllers\api\v1\PostApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
        Route::apiResource('post', PostApiController::class)->middleware('auth:api');
        Route::prefix('auth')->group(function () {
            Route::post('login', [AuthApiController::class, 'login']);
            Route::middleware('auth:api')->group( function () {
                Route::post('refresh', [AuthApiController::class, 'refresh']);
                Route::get('me', [AuthApiController::class, 'me']);
                Route::post('logout', [AuthApiController::class, 'logout']);
            });
        });
});
