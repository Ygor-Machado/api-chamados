<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/departaments', [DepartamentController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('admin')->group(function () {
        Route::apiResource('departaments', DepartamentController::class)->except('index');
        Route::apiResource('users', UserController::class);
    });
});

Route::post('/login', [AuthController::class, 'login']);

