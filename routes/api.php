<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('tickets', [TicketController::class, 'index']);
    Route::get('tickets/{ticket}', [TicketController::class, 'show']);
    Route::post('tickets', [TicketController::class, 'store']);

    Route::get('/departaments', [DepartamentController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('admin')->group(function () {
        Route::apiResource('departaments', DepartamentController::class)->except('index');
        Route::put('tickets/{ticket}', [TicketController::class, 'update']);
        Route::apiResource('users', UserController::class);
    });
});

Route::post('/login', [AuthController::class, 'login']);

