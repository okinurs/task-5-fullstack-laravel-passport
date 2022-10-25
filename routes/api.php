<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
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
Route::group(['prefix' => 'v1'], function(){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('categories', CategoryController::class);
    // Route::get('user-detail/{id}',[AuthController::class,'me']);
});

Route::middleware('auth:api')->group( function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::get('posts/category/{id}', [PostController::class, 'detail']);
// Route::get('posts/{id}', [PostController::class, 'show']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
