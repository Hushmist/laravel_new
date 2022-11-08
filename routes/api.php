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



//выдача всех новостей конкретного автора
Route::get('getNewsByAuthor/{author_id}', [App\Http\Controllers\Api\NewsController::class, 'getByAuthor']); 

//выдача списка всех новостей, которые относятся к указанной рубрике
Route::get('getNewsByCategory/{category_id}', [App\Http\Controllers\Api\NewsController::class, 'getByCategory']); 

// выдача списка авторов
// Добавить Автора - method=POST
Route::apiResource('author', App\Http\Controllers\Api\AuthorController::class);

// выдача информации о статьях по их идентификаторам
// Добавить новости - method=POST
Route::apiResource('news', App\Http\Controllers\Api\NewsController::class);

// искать новости по рубрике, включая дочерние
Route::get('getNewsByCategory/{category_id}/{subcategory_id}', [App\Http\Controllers\Api\NewsController::class, 'getBySubcategory']); 
Route::get('getNewsByCategory/{category_id}/{subcategory_id}/{subcategory_parameter_id}', [App\Http\Controllers\Api\NewsController::class, 'getBySubcategory_parametr']); 

// поиск новости по названию
Route::get('getNewsByTitle/{title}', [App\Http\Controllers\Api\NewsController::class, 'getByTitle']);

// Добавить Рубрику - method=POST
Route::apiResource('category', App\Http\Controllers\Api\CategoryController::class);/*->only([
        'index', 'store', ''
    ]);*/

Route::apiResource('subcategory', App\Http\Controllers\Api\SubcategoryController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
