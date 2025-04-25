<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();
return view('posts.index', compact('posts'));
}

public function store(Request $request)
{
// バリデーション
$request->validate([
'post' => 'required|max:150|min:2',
]);

Post::create([
'user_id' => auth()->id(),
'post'    => $request->input('post'),
]);
return redirect('top');
}
public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}


 public function update(Request $request,Post $post)
    {
        $request->validate([
        'post' => 'required|max:150|min:2',
    ]);

       $post->post = $request->input('post');


     return redirect()->route('top')->with('success', '投稿を更新しました！');

    }

}
