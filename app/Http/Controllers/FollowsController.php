<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList()
{
    $user = auth()->user();
    // ユーザーがフォローしている人をリレーションで取得
    $followings = $user->followings()->get();
    // followings からユーザーIDだけを抽出
    $followedUserIds = $followings->pluck('id');
    // そのユーザーたちの投稿を取得
    $posts = \App\Models\Post::whereIn('user_id', $followedUserIds)
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->get();
    // すべてビューに渡す
    return view('follows.followList', compact('followings', 'posts'));
}

public function followerList()
{
    $user = auth()->user();
    // フォロワー一覧
    $followers = $user->followers()->get();
    // フォロワーの投稿一覧
    $posts = \App\Models\Post::whereIn('user_id', $followers->pluck('id'))
        ->latest()
        ->get();
    return view('follows.followerList', compact('followers', 'posts'));
}

    public function follow($id)
{
    auth()->user()->followings()->attach($id);
    return back();
}

public function unfollow($id)
{
    auth()->user()->followings()->detach($id);
    return back();
}
}
