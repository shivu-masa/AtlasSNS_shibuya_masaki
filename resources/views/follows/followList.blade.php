<x-login-layout>

<h2 class="text-center">フォローリスト</h2>

{{-- フォロー中のユーザーアイコン一覧 --}}
<div class="d-flex flex-wrap justify-content-center mb-4">
  @foreach($followings as $followUser)
    <a href="{{ route('users.profile', ['id' => $followUser->id]) }}" class="me-3 text-center">
      @if ($followUser->icon_image)
        <img src="{{ asset('storage/' . $followUser->icon_image) }}" alt="アイコン" width="60" height="60" class="rounded-circle">
      @else
        <img src="{{ asset('images/default-icon.png') }}" alt="デフォルト画像" width="60" height="60" class="rounded-circle">
      @endif
      <div>{{ $followUser->username }}</div>
    </a>
  @endforeach
</div>
<div class="post-separator"></div>


{{--  下部：フォロー中ユーザーの投稿一覧 --}}
<div class="posts-list" style="margin-left: 100px;">
  @foreach ($posts as $post)
    <div class="d-flex align-items-start mb-4">
      {{-- プロフィール画像 --}}
      <a href="{{ route('users.profile', ['id' => $post->user->id]) }}">
        @if ($post->user->icon_image)
          <img src="{{ asset('storage/' . $post->user->icon_image) }}"
               alt="プロフィール画像"
               class="rounded-circle"
               style="width:50px; height:50px;">
        @else
          <img src="{{ asset('images/default-icon.png') }}"
               alt="デフォルト画像"
               class="rounded-circle"
               style="width:50px; height:50px;">
        @endif
      </a>

      {{-- ユーザー名と投稿内容 --}}
      <div class="ml-3">
        <strong>{{ $post->user->username }}</strong><br>
        {{ $post->post }}<br>
        <small class="text-muted">投稿日時：{{ $post->created_at->format('Y/m/d H:i') }}</small>
      </div>
    </div>
    <div class="post-separator2"></div>
  @endforeach
</div>

</div>

</x-login-layout>
