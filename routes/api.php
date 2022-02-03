<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('client')->group(function () {
    Route::get('/team', [\App\Http\Controllers\Api\TeamController::class, 'list']);

    Route::get('/article/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'get'])
        ->where('id', '[0-9]+');
    Route::prefix('articles')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\ArticleController::class, 'list']);
        Route::get('/tags', [\App\Http\Controllers\Api\ArticleController::class, 'tags']);
        Route::get('/categories', [\App\Http\Controllers\Api\ArticleController::class, 'categories']);
    });

    Route::get('/games', [\App\Http\Controllers\Api\GameController::class, 'list']);
    Route::get('/game/{id}', [\App\Http\Controllers\Api\GameController::class, 'get'])
        ->where('id', '[0-9]+');

    // api/client/article
    // api/client/article with params
    // api/client/table
    // api/client/tags
});
