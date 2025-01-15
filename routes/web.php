<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
    Route::get('signin', [AuthController::class, 'index'])->name("login")->middleware("guest");
    Route::get('register', [AuthController::class, 'register'])->middleware("guest");
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware("auth");
});

Route::middleware("auth")->group(function () {
    Route::get('/', [HomeController::class, 'index']);
});
