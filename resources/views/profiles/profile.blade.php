<x-login-layout>



{{-- プロフィール表示 --}}
<div class="container px-4 mt-5" style="margin-left: 10%; margin-right: auto;">
  <div class="d-flex justify-content-between align-items-center pb-3 mb-2">
    <div class="d-flex align-items-center">
      {{-- プロフィール画像 --}}
      <img src="{{ !empty($post->user->icon_image) && file_exists(public_path('storage/' . $post->user->icon_image))
            ? asset('storage/' . $post->user->icon_image)
            : asset('images/icon1.png') }}"
     alt="プロフィール画像"
     class="rounded-circle"
     style="width: 60px; height: 60px;">

      <div class="ms-4">
        <h5 class="mb-3">ユーザー名：{{ $user->username }}</h5>
        <h5 class="mb-1">自己紹介：{{ $user->bio }}</h5>
      </div>
    </div>

    {{-- フォロー／フォロー解除ボタン --}}
    <div style="margin-right: 30px; min-width: 200px;">
      @if (in_array($user->id, $followings))
        <form method="POST" action="{{ route('unfollow', $user->id) }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" style="width: 100px; height: 35px; font-size: 12px;position: absolute;right: 515px ;">
            フォロー解除
          </button>
        </form>
      @else
        <form method="POST" action="{{ route('follow', $user->id) }}">
          @csrf
          <button type="submit" class="btn btn-primary" style="width: 100px; height: 35px; font-size: 12px; position: absolute;right: 515px ;">
            フォローする
          </button>
        </form>
      @endif
    </div>
  </div>
</div>


<div class="post-separator"></div>

{{-- 投稿一覧 --}}
<div class="container px-4" style="margin-left: 10%; margin-right: auto;">
  <div class="posts-list" style="margin-left: 0px;">
    @foreach ($user->posts->sortByDesc('created_at') as $post)
      <div class="d-flex align-items-start mb-5" style="position: relative;">
        {{-- プロフィール画像 --}}
        <img src="{{ !empty($post->user->icon_image) && file_exists(public_path('storage/' . $post->user->icon_image))
            ? asset('storage/' . $post->user->icon_image)
            : asset('images/icon1.png') }}"
     alt="プロフィール画像"
     class="rounded-circle"
     style="width: 40px; height: 40px;">

        {{-- ユーザー名・投稿内容・日時 --}}
        <div class="ms-3">
          <div class="d-flex align-items-center">
            <strong class="me-2">{{ $post->user->username }}</strong>
            <small class="text-muted"style="position: absolute;right: 215px ;">
              {{ $post->created_at->format('Y/m/d ') }}
            </small>
          </div>
          {!! nl2br(e($post->post)) !!}
        </div>
      </div>

      <div class="post-separator2"></div>
    @endforeach
  </div>
</div>

</x-login-layout>
