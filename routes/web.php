<?php

use App\Http\Controllers\Backend\AlbumController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\PhotoController;
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
        Route::get('/retrieve/{id}', [AlbumController::class, 'retrieve_by_id']);
        Route::get('/get_options', [AlbumController::class, 'get_options']);
        Route::post('/', [AlbumController::class, 'store']);
        Route::post('/{id}', [AlbumController::class, 'update']);
        Route::delete('/{id}', [AlbumController::class, 'destroy']);
    });
    Route::prefix('photo')->group(function(){
        // Route::get('/', [AlbumController::class, 'index']);
        Route::get('/retrieve_by_user', [PhotoController::class, 'retrieve_by_user']);
        Route::get('/retrieve/{id}', [PhotoController::class, 'retrieve_by_id']);
        // Route::get('/get_options', [AlbumController::class, 'get_options']);
        Route::post('/', [PhotoController::class, 'store']);
        Route::post('/{id}', [AlbumController::class, 'update']);
        Route::delete('/{id}', [PhotoController::class, 'destroy']);
    });
});
