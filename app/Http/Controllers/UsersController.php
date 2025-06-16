<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{

   public function search(Request $request)
{
    //キーワードを取得し、前後の空白を除去
    $keyword = trim($request->input('keyword'));
    // 自分以外のusernameを曖昧検索
    if (!empty($keyword)) {
        $users = User::where('username', 'like', "%{$keyword}%")
            ->where('id', '!=', auth()->id())
            ->get();
    } else {
        $users =  User::all()
        ->where('id', '!=', auth()->id());
    }
    $followings = auth()->user()->followings()->pluck('followed_id')->toArray();
    return view('users.search', compact('users', 'keyword', 'followings'));

}

public function follow($id)
{
    $user = auth()->user();
    $user->followings()->attach($id); // 多対多リレーション前提
    return redirect()->back();
}

public function unfollow($id)
{
    $user = auth()->user();
    $user->followings()->detach($id);
    return redirect()->back();
}

public function show($id)
{
    $user = User::findOrFail($id);
    $posts = $user->posts()->latest()->get();
    $followings = Auth::user()->followings->pluck('id')->toArray();
    return view('profiles.profile',  compact('user','posts', 'followings'));
}
}
