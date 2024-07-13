<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [ArticleController::class, 'index']);
Route::put('/articles/{article_id}', [ArticleController::class, 'update']);
Route::post('/articles', [ArticleController::class, 'store']);
Route::delete('/articles/{article_id}', [ArticleController::class, 'destroy']);
