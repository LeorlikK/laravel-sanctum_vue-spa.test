<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/post', [PostController::class, 'store']);
    Route::get('/post/{post}', [PostController::class, 'show']);
    Route::post('/post/{post}/edit', [PostController::class, 'edit']);
    Route::delete('/post/{post}/delete', [PostController::class, 'destroy']);
    Route::get('/categories', [CategoryController::class, 'index']);
});
