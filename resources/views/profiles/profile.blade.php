<x-login-layout>



<div class="container">
  <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
    <div class="d-flex align-items-center">

      {{-- プロフィール画像 --}}
      <img src="{{ $user->icon_image ? asset('storage/' . $user->icon_image) : asset('images/default-icon.png') }}"
     alt="プロフィール画像"
     class="rounded-circle me-3"
     style="width: 70px; height: 70px;">

      <div>
        <h5 class="mb-1">ユーザー名：{{ $user->username }}</h5>
        <p class="mb-0">自己紹介：{{ $user->bio }}</p>
      </div>
    </div>

    {{-- フォローボタン --}}
@if (auth()->id() !== $user->id)
<!-- 今見ているユーザーが、自分がフォローしている人の中にいるか -->
    @if (in_array($user->id, auth()->user()->followings()->pluck('followed_id')->toArray()))
        {{-- フォロー済み：フォロー解除 --}}
        <form method="POST" action="{{ route('unfollow', ['id' => $user->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
    @else
        {{-- 未フォロー：フォローする --}}
        <form method="POST" action="{{ route('follow', ['id' => $user->id]) }}">
            @csrf
            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
    @endif
@endif
  </div>

  {{-- 投稿一覧 --}}
  <div>
    <h5 class="mb-3">投稿一覧</h5>
    @foreach ($user->posts->sortByDesc('created_at') as $post)
    <div class="ml-3">
    <img src="{{ $user->icon_image ? asset('storage/' . $user->icon_image) : asset('images/default-icon.png') }}"
     alt="プロフィール画像"
     class="rounded-circle me-3"
     style="width: 30px; height: 30px;">
        <strong style="padding: 0px;">{{ $post->user->username }}</strong><br>
        {{ $post->post }}<br>
        <small class="text-muted">投稿日時：{{ $post->created_at->format('Y/m/d H:i') }}</small>
      </div>
    @endforeach
  </div>
</div>

</x-login-layout>
