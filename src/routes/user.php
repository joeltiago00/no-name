<?php

use App\Http\Controllers\Post\PostStoreController;
use App\Http\Controllers\User\Email\EmailConfirmationController;
use App\Http\Controllers\User\Email\SendEmailConfirmationController;
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

Route::prefix('user')->name('user.')->group(function () {
    Route::post('', UserStoreController::class)->name('store');

    Route::middleware('auth:sanctum')->group(function () {
        Route::group(['prefix' => '{userId}'], function () {
            Route::get('', UserShowController::class)->name('show');

            Route::prefix('post')->group(function () {
                Route::post('', PostStoreController::class);
            });

            Route::prefix('email')->group(function () {
                Route::get('send-confirmation', SendEmailConfirmationController::class);

            });
        });

        Route::get('', UserListController::class);
    });

    Route::group(['prefix' => '{userId}'], function () {
        Route::prefix('email')->group(function () {
            Route::get('email-confirmation', EmailConfirmationController::class);
        });

    });
});

