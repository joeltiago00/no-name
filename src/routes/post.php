<?php

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

Route::prefix('post')->name('post.')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('{userId}')->group(function () {
//            Route::post('', PostStoreController::class);
        });
    });
});

