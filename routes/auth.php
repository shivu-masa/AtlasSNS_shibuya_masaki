<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;



    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');//画面表示
    Route::post('login', [AuthenticatedSessionController::class, 'store']);//ログイン処理

    Route::get('register', [RegisteredUserController::class, 'create']);
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'added']);


    Route::post('/create',[RegisteredUserController::class, 'store']);
    Route::get('/added',[RegisteredUserController::class, 'added']);

//ログアウト
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
