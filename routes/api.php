<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rute untuk login dan register
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Rute yang tidak memerlukan autentikasi
Route::get('events', [EventController::class, 'index']);
Route::get('events/{id}', [EventController::class, 'show']);

// Rute yang memerlukan autentikasi dengan Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('logout', [AuthController::class, 'logout']);
});