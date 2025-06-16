<x-login-layout>

<div class="row align-items-center mt-5 mb-4">
  {{-- フォロワーリストの見出し --}}
  <div class="col-auto" style="margin-left: 600px;">
    <h2 class="mb-0" style="margin-top: -35px;">フォロワーリスト</h2>
  </div>

  {{-- フォロワーのユーザーアイコン一覧 --}}
  <div class="col mb-5" style="margin-left: 30px;">
    <div class="d-flex flex-wrap justify-content-start align-items-center gap-3">
      @foreach($followers as $follower)
        <a href="{{ route('users.profile', ['id' => $follower->id]) }}" class="text-center text-decoration-none text-dark">
          @if ($follower->icon_image)
            <img src="{{ asset('storage/' . $follower->icon_image) }}" alt="アイコン"
                 width="40" height="40" class="rounded-circle mb-1">
          @else
            <img src="{{ asset('images/default-icon.png') }}" alt="デフォルト画像"
                 width="40" height="40" class="rounded-circle mb-1">
          @endif
          <div style="font-size: 0.9rem;">{{ $follower->username }}</div>
        </a>
      @endforeach
    </div>
  </div>

  <div class="post-separator"></div>

  {{-- 下部：フォロワーの投稿一覧 --}}
  <div class="posts-list" style="margin-left: 100px;">
    @foreach ($posts as $post)
      <div class="d-flex align-items-start mb-5" style="position: relative;">
        {{-- プロフィール画像 --}}
        <a href="{{ route('users.profile', ['id' => $post->user->id]) }}">
          @if ($post->user->icon_image)
            <img src="{{ asset('storage/' . $post->user->icon_image) }}"
                 alt="プロフィール画像"
                 class="rounded-circle"
                 style="width:40px; height:40px;">
          @else
            <img src="{{ asset('images/default-icon.png') }}"
                 alt="デフォルト画像"
                 class="rounded-circle"
                 style="width:40px; height:40px;">
          @endif
        </a>

        {{-- ユーザー名と投稿内容 --}}
        <div class="ms-3 flex-grow-1">
          <div class="d-flex align-items-center">
            <strong class="me-2">{{ $post->user->username }}</strong>
            <small class="text-muted" style="margin-left: 1350px;">{{ $post->created_at->format('Y/m/d H:i') }}</small>
          </div>
          <div>
            {!! nl2br(e($post->post)) !!}
          </div>
        </div>
      </div>

      <div class="post-separator2"></div>
    @endforeach
  </div>
</div>


</x-login-layout>
