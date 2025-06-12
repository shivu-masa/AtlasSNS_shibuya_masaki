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

Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.id');
Route::post('search', [UsersController::class, 'index']);

Route::post('follow-list', [PostsController::class, 'followings']);
Route::post('follower-list', [PostsController::class, 'followers']);

Route::post('/posts', [PostsController::class, 'store'])->name('post.store');
Route::get('/posts/edit', [PostsController::class, 'edit'])->name('post.edit');
Route::get('/top', [PostsController::class, 'index'])->name('top');

Route::get('users/follow', [FollowsController::class, 'followList'])->name('followList');

Route::get('/followerList', [FollowsController::class, 'followerList'])->name('followerList');

Route::get('/users/search', [UsersController::class, 'search'])->name('users.search');

Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('post.edit');

Route::put('/posts/{post}', [PostsController::class, 'update'])->name('post.update');

Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('post.destroy');

Route::post('/follow/{id}', [FollowsController::class, 'follow'])->name('follow');

Route::delete('/unfollow/{id}', [FollowsController::class, 'unfollow'])->name('unfollow');

Route::get('/user/{id}', [UsersController::class, 'show'])->name('users.profile');

Route::post('/follow/{id}', [UsersController::class, 'follow'])->name('follow');

Route::delete('/unfollow/{id}', [UsersController::class, 'unfollow'])->name('unfollow');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');

Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});
