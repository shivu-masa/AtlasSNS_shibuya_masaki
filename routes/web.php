<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




//auth.phpのパスを取得
require __DIR__ . '/auth.php';

 Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::middleware(['auth'])->group(function () {

Route::get('/top', [PostsController::class, 'index']);

Route::post('top', [PostsController::class, 'index']);

Route::post('profile', [ProfileController::class, 'profile']);

Route::post('search', [UsersController::class, 'index']);

Route::post('follow-list', [PostsController::class, 'index']);
Route::post('follower-list', [PostsController::class, 'index']);
Route::post('/', [PostsController::class, 'index'])->name('top');
});
