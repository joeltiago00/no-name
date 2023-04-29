<?php

use App\Http\Controllers\Church\ChurchDeleteController;
use App\Http\Controllers\Church\ChurchIndexController;
use App\Http\Controllers\Church\ChurchStoreController;
use App\Http\Controllers\Church\ChurchUpdateController;
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

Route::prefix('church')->name('church.')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('', ChurchStoreController::class)->name('store');
        Route::get('', ChurchIndexController::class)->name('index');

        Route::prefix('{churchId}')->group(function () {
            Route::patch('', ChurchUpdateController::class)->name('update');
            Route::delete('', ChurchDeleteController::class)->name('update');
        });
    });
});

