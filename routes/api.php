<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::middleware(['auth:sanctum', AdminMiddleware::class ])->group(function () {
    Route::apiResource('departaments', DepartamentController::class);
    Route::apiResource('users', UserController::class);
});

Route::post('/login', [AuthController::class, 'login']);

