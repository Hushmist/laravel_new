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


Route::apiResource('news', App\Http\Controllers\Api\NewsController::class);
Route::apiResource('category', App\Http\Controllers\Api\CategoryController::class);/*->only([
        'index', 'store', ''
    ]);*/
Route::apiResource('subcategory', App\Http\Controllers\Api\SubcategoryController::class);
Route::apiResource('author', App\Http\Controllers\Api\AuthorController::class);
