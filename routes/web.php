<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AlbumController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\PhotoDetailController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ReportController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
    Route::get('signin', [AuthController::class, 'index'])->name("login")->middleware("guest");
    Route::get('register', [AuthController::class, 'register'])->middleware("guest");
    Route::post('register', [AuthController::class, 'pendingRegistration'])->middleware("guest");
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware("auth");
});

Route::middleware(["allow.guest.get", "isAdmin"])->group(function () {

    Route::get('/', [HomeController::class, 'index']);

    Route::prefix('album')->group(function () {
        Route::get('/', [AlbumController::class, 'index']);
        Route::get('/retrieve_by_user/{id}', [AlbumController::class, 'retrieve_by_user']);
        Route::get('/retrieve/{id}', [AlbumController::class, 'retrieve_by_id']);
        Route::get('/get_options', [AlbumController::class, 'get_options']);
        Route::post('/', [AlbumController::class, 'store']);
        Route::post('/{id}', [AlbumController::class, 'update']);
        Route::delete('/{id}', [AlbumController::class, 'destroy']);

        Route::prefix('detail')->group(function () {
            Route::get('/{id}', [AlbumController::class, 'detail']);
            Route::get('/comment/{id}', [PhotoDetailController::class, 'retrieveComment']);
            Route::post('/comment/{id}', [PhotoDetailController::class, 'storeComment']);
        });
    });

    Route::prefix('photo')->group(function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/retrieve', [PhotoController::class, 'retrieve']);
        Route::get('/retrieve_by_user/{id}', [PhotoController::class, 'retrieve_by_user']);
        Route::get('/retrieve/{id}', [PhotoController::class, 'retrieve_by_id']);
        // Route::get('/get_options', [AlbumController::class, 'get_options']);
        Route::post('/', [PhotoController::class, 'store']);
        Route::post('/{id}', [PhotoController::class, 'update']);
        Route::delete('/{id}', [PhotoController::class, 'destroy']);

        Route::post('/like/{id}', [PhotoController::class, 'likeOrUnlike']);

        Route::prefix('detail')->group(function () {
            Route::get('/{id}', [PhotoDetailController::class, 'index']);
            Route::get('/download/{id}', [PhotoDetailController::class, 'download']);
            Route::get('/comment/{id}', [PhotoDetailController::class, 'retrieveComment']);
            Route::post('/comment/{id}', [PhotoDetailController::class, 'storeComment']);
        });
    });

    Route::prefix('notification')->group(function () {
        Route::get('/', [NotificationController::class, 'index']);
    });

    Route::prefix('/profile')->group(function () {
        Route::get('/{id}', [UserController::class, 'index']);
        Route::put('/{id}', [UserController::class, 'update']);
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('report')->group(function(){
        Route::get('/',[ReportController::class, 'index']);
        Route::get('/retrieve',[ReportController::class, 'retrieve']);
    });

    Route::middleware("admin")->group(function () {
        Route::prefix("admin")->group(function () {
            Route::get("/", [AdminController::class, 'index']);
            Route::post("/{id}", [AdminController::class, 'processRegister']);
        });
    });
});
