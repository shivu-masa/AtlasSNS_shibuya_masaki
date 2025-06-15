<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
// 投稿一覧表示
    public function index()
    {
       $user = Auth::user();

    // 自分と、自分がフォローしているユーザーのIDを取得
    $followedUserIds = $user->followings()->pluck('followed_id')->toArray();
    $userIds = array_merge([$user->id], $followedUserIds);

    // そのユーザーたちの投稿のみ取得
    $posts = Post::whereIn('user_id', $userIds)->with('user')->latest()->get();

    return view('posts\index', compact('posts'));
    }

// 投稿の新規作成
public function store(Request $request)
{
// $request-formで送られてきた情報を受け取る
$request->validate([
'post' => 'required|max:150|min:2',
]);
// postsテーブルに作成
Post::create([
    // ログイン中のIDに紐づけ
'user_id' => auth()->id(),
// postに保存
'post'    => $request->input('post'),
]);
return redirect('top');
}

// 編集画面の表示
public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}

// 投稿の更新処理
 public function update(Request $request,Post $post)
    {
        $request->validate([
        'post' => 'required|max:150|min:2',
    ]);

    //データベースに実際に反映
       $post->post = $request->input('post');
 $post->save();
     return redirect()->route('top')->with('success', '投稿を更新しました！');
    }

// 投稿の削除
public function destroy(Post $post)
{
    // 現在ログインしているユーザーのIDと削除対象の投稿のユーザーIDを比較
    if (auth()->id() !== $post->user_id) {
        abort(403, '権限がありません');
    }
// 削除
    $post->delete();
    return redirect()->back()->with('success', '投稿を削除しました');
}

}
