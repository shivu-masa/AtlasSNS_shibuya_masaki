<x-login-layout>

<div class="row align-items-center mt-5 mb-4">
  {{-- フォローリストの見出し --}}
  <div class="col-auto" style="margin-left: 600px;">
    <h2 class="mb-0"style="margin-top: -35px;">フォローリスト</h2>
</div>

  {{-- フォロー中のユーザーアイコン一覧 --}}
  <div class="col mb-5" style="margin-left: 30px;">
  <div class="d-flex flex-wrap justify-content-start align-items-center gap-3">
    @foreach($followings as $followUser)
      <a href="{{ route('users.profile', ['id' => $followUser->id]) }}" class="text-center text-decoration-none text-dark">
      <img class="rounded-circle me-2"
     src="{{ $followUser->icon_image && file_exists(public_path('storage/' . $followUser->icon_image))
        ? asset('storage/' . $followUser->icon_image)
        : asset('images/icon1.png') }}"
     alt="プロフィール画像"
     width="40" height="40">
        <div style="font-size: 0.9rem;">{{ $followUser->username }}</div>
      </a>
    @endforeach
  </div>
</div>

<div class="post-separator"></div>


{{-- 下部：フォロー中ユーザーの投稿一覧 --}}
<div class="posts-list" style="margin-left: 100px;">
  @foreach ($posts as $post)
    <div class="d-flex align-items-start mb-5" style="position: relative;">
      {{-- プロフィール画像 --}}
      <a href="{{ route('users.profile', ['id' => $post->user->id]) }}">
        <img src="{{ !empty($post->user->icon_image) && file_exists(public_path('storage/' . $post->user->icon_image))
              ? asset('storage/' . $post->user->icon_image)
              : asset('images/icon1.png') }}"
             alt="プロフィール画像"
             class="rounded-circle"
             style="width: 40px; height: 40px;">
      </a>

      {{-- ユーザー名と投稿内容 --}}
      <div class="ms-3 flex-grow-1">
        <div class="d-flex align-items-center">
          <strong class="me-2">{{ $post->user->username }}</strong>
          <small class="text-muted" style="position: absolute;right: 600px;">{{ $post->created_at->format('Y/m/d H:i') }}</small>
        </div>
        <div>{!! nl2br(e($post->post)) !!}</div>
      </div>
    </div>


    <div class="post-separator2"></div>

  @endforeach
</div>
</div>

</x-login-layout>
