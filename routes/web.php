<?php

use App\Http\Controllers\Backend\AlbumController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
    Route::get('signin', [AuthController::class, 'index'])->name("login")->middleware("guest");
    Route::get('register', [AuthController::class, 'register'])->middleware("guest");
    Route::post('register', [AuthController::class, 'registerProcess'])->middleware("guest");
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware("auth");
});

Route::middleware("auth")->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::prefix('/profile')->group(function(){
        Route::get('/', function(){
            return view('profile.index');
        });

        Route::put('/{id}', [UserController::class, 'update']);
    });
    Route::prefix('album')->group(function(){
        Route::get('/', [AlbumController::class, 'index']);
        Route::get('/retrieve', [AlbumController::class, 'retrieve']);
        Route::get('/{id}', [AlbumController::class, 'retrieve_by_id']);
        Route::post('/', [AlbumController::class, 'store']);
        Route::post('/{id}', [AlbumController::class, 'update']);
        Route::delete('/{id}', [AlbumController::class, 'destroy']);
    });
});
