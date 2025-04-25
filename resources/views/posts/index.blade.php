<x-login-layout>

<div class="postbox">

<img class= "profile-image"src="{{ asset('images/icon1.png') }}">
  <form method="POST"  action="{{ url('/posts')}}">
    @csrf
    <label class="post-label">
      <input type="text" name="post" class="post" placeholder="投稿内容を入力してください" required>
    </label>

    <label class="image-label">
      <input type="image" src="{{ asset('images/post.png') }}">
    </label>
  </form>
</div>

 <div class="posts-list">

   @foreach($posts as $post)

 @if($post->user->profile_image)
   {{-- プロフ画像 --}}
            <img src="{{ asset('storage/' . $post->user->profile_image) }}"
                 alt="プロフィール画像">

        @endif

             {{-- ユーザー名と投稿内容 --}}
        <div class="ml-3">
            <strong>{{ $post->user->username }}</strong><br>
            {{ $post->post }}<br>
            <small>投稿日時：{{ $post->created_at }}</small>
        </div>

        <input type="image" class="edit-button" img src="{{ asset('images/edit_h.png') }}" style="width:30px; height:30px;">
    </input>

<input type="image"class="trash-button" img src="{{ asset('images/trash-h.png') }}" style="width:30px; height:30px;">
    </input>

        @endforeach
    </div>

</x-login-layout>
