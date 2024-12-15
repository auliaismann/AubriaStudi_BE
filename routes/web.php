<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\AuthController;

// Route::resource('events', EventController::class);
Route::get('/', function() {
    return ('view');
});
// Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('register', [AuthController::class, 'register']);

