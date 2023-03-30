<?php

use App\Http\Controllers\Post\PostListController;
use App\Http\Controllers\Post\PostShowController;
use App\Http\Controllers\Post\PostLikeController;
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
        Route::prefix('{postId}')->group(function () {
            Route::get('like-or-unlike', PostLikeController::class);
            Route::get('', PostShowController::class);
        });

        Route::get('', PostListController::class);
    });
});
