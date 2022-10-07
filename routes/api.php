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
Route::prefix('v1')->group(function () {
    Route::post('/register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register'])->name('user.register');
    Route::get('/isAuth', [\App\Http\Controllers\Api\Auth\AuthController::class, 'isAuth'])->name('user.isAuth');
    Route::post('/login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login'])->name('user.login')->name('user.login');
    Route::post('/what-to-do', [\App\Http\Controllers\WhatToDoController::class, 'store']);
    Route::post('/what-to-do-item', [\App\Http\Controllers\WhatToDoItemController::class, 'store']);
    Route::get('/what-to-do-item', [\App\Http\Controllers\WhatToDoItemController::class, 'index']);
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::prefix('v1')->group(function () {
        Route::get('/isAuth', [\App\Http\Controllers\Api\Auth\AuthController::class, 'isAuth'])->name('user.isAuth');
    });
});
Route::get('/file', [\App\Http\Controllers\Api\Auth\AuthController::class, 'getFile']);
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
