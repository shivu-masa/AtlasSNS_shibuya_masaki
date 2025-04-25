<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
      protected $fillable = [
        'user_id',
        'post',
    ];

    public function user() {
    return $this->belongsTo(\App\Models\User::class);
}

public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}

}
