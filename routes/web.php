<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\FollowsController;


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

Route::middleware(['auth'])->group(function () {

Route::get('/top', [PostsController::class, 'index']);

Route::post('top', [PostsController::class, 'index']);

Route::get('profile', [ProfileController::class, 'profile'])->name('profile');

Route::post('search', [UsersController::class, 'index']);

Route::post('follow-list', [PostsController::class, 'index']);
Route::post('follower-list', [PostsController::class, 'index']);

Route::post('/posts', [PostsController::class, 'store'])->name('post.store');
Route::get('/posts/edit', [PostsController::class, 'edit'])->name('post.edit');
Route::get('/top', [PostsController::class, 'index'])->name('top');

Route::get('/followList', [FollowsController::class, 'followList'])->name('follow');

Route::get('/followerList', [FollowsController::class, 'followerList'])->name('follower');

Route::get('/users.search', [UsersController::class, 'search'])->name('users.search');

Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('post.edit');

Route::put('/posts/{post}', [PostsController::class, 'update'])->name('post.update');


});
