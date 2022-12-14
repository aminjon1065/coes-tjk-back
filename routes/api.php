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
    Route::get('/emergencies/{emergency}', [\App\Http\Controllers\EmergenciesCountController::class, 'index'])->name('emergencies.get');
    Route::post('/emergencies', [\App\Http\Controllers\EmergenciesCountController::class, 'store'])->name('emergencies.post');
    Route::post('/register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register'])->name('user.register');
    Route::get('/isAuth', [\App\Http\Controllers\Api\Auth\AuthController::class, 'isAuth'])->name('user.isAuth');
    Route::post('/login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login'])->name('user.login')->name('user.login');
    Route::post('/what-to-do', [\App\Http\Controllers\WhatToDoController::class, 'store']);
    Route::post('/what-to-do-item', [\App\Http\Controllers\WhatToDoItemController::class, 'store']);
    Route::get('/what-to-do-item', [\App\Http\Controllers\WhatToDoItemController::class, 'index']);
    Route::post("/notification-expo", [\App\Http\Controllers\ExpoNotificationController::class, "send"]);
    Route::post("/store-token", [\App\Http\Controllers\ExpoNotificationController::class, "storeToken"]);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::prefix('v1')->group(function () {
        Route::get('/isAuth', [\App\Http\Controllers\Api\Auth\AuthController::class, 'isAuth'])->name('user.isAuth');
        Route::post('/logout', [\App\Http\Controllers\Api\Auth\AuthController::class, 'logout'])->name('user.logout');
    });
});

Route::get('/file', [\App\Http\Controllers\Api\Auth\AuthController::class, 'getFile']);
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
