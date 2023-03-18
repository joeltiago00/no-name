<?php

use App\Http\Controllers\User\UserListController;
use App\Http\Controllers\User\UserShowController;
use App\Http\Controllers\User\UserStoreController;
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

Route::prefix('user')
    ->name('user.')
    ->group(function () {
        Route::post('', UserStoreController::class)->name('store');

        Route::middleware('auth:sanctum')
        ->group(function () {
            Route::group(['prefix' => '{userId}'], function () {
                Route::get('', UserShowController::class)->name('show');
            });

            Route::get('', UserListController::class);
        });
    });

