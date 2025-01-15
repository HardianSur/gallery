<?php

use App\Http\Controllers\Backend\AlbumController;
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
    Route::prefix('/profile')->group(function(){
        Route::get('/', function(){
            return view('profile.index');
        });
    });
    Route::prefix('album')->group(function(){
        Route::get('/', [AlbumController::class, 'index']);

    });
});
