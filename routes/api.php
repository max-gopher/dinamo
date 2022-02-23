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
    // Команда
    Route::get('/team', [\App\Http\Controllers\Api\TeamController::class, 'list']);

    // Статьи
    Route::get('/article/{slug}', [\App\Http\Controllers\Api\ArticleController::class, 'get']);
    Route::prefix('articles')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\ArticleController::class, 'list']);
        Route::get('/tags', [\App\Http\Controllers\Api\ArticleController::class, 'tags']);
        Route::get('/categories', [\App\Http\Controllers\Api\ArticleController::class, 'categories']);
    });

    // Матчи
    Route::get('/game/last', [\App\Http\Controllers\Api\GameController::class, 'last']);
    Route::prefix('games')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\GameController::class, 'list']);
        Route::get('/future', [\App\Http\Controllers\Api\GameController::class, 'future']);
    });

    Route::prefix('season')->group(function () {
        Route::get('/table', [\App\Http\Controllers\Api\SeasonController::class, 'table']);
    });

    // Настройки
    Route::get('/settings', function () {
        return response()->json([
            'items' => \App\Http\Resources\SettingResource::make(\App\Models\Setting::first())
        ]);
    });

    // api/client/table
});
