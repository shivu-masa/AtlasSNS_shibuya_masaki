<x-login-layout>

<div class="d-flex align-items-center" style="gap: 10px; margin-left: 50px; margin-top: 40px;">
  {{-- 検索フォーム --}}
  <form method="GET" action="{{ route('users.search') }}" class="d-flex align-items-center" style="gap: 10px;">
    <input type="text" name="keyword"
           placeholder="ユーザー名を検索"
           value="{{ old('keyword', $keyword ?? '') }}"
           style="width: 400px; height: 40px; padding: 8px 12px; font-size: 16px; border-radius: 5px; border: 1px solid #ccc;">

    <button type="submit"
            class="btn"
            style="width: 40px; height: 40px; padding: 0; border: none; background: none;">
      <img src="{{ asset('images/search.png') }}"
           style="width: 40px; height: 40px; display: block;">
    </button>
  </form>

  {{-- 検索ワード表示 --}}
  @if(!empty($keyword))
    <p style="margin: 0;font-size: 16px;">検索ワード: <strong>{{ $keyword }}</strong></p>
  @endif

</div>
<div class="post-separator"></div>
@foreach ($users as $user)
  <div class="d-flex justify-content-center align-items-center mb-4" style="gap: 200px;">

    {{-- アイコンと名前を縦中央に揃える --}}
    <div class="d-flex align-items-center" style="min-width: 200px;">
  <a href="{{ route('users.profile', ['id' => $user->id]) }}"
     class="d-flex align-items-center text-decoration-none text-dark">

    <img src="{{ !empty($user->icon_image) && file_exists(public_path('storage/' . $user->icon_image))
        ? asset('storage/' . $user->icon_image)
        : asset('images/icon1.png') }}"
         alt="プロフィール画像"
         class="rounded-circle"
         style="width: 60px; height: 60px;">

    <div class="ms-3">
      <div>{{ $user->username }}</div>
    </div>
  </a>
</div>

    {{-- ボタン：200px固定、縦中央 --}}
    <div style="min-width: 200px;">
    @if (in_array($user->id, $followings))
  {{-- フォロー済み：フォロー解除ボタン --}}
  <form method="POST" action="{{ route('unfollow', $user->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"
            style="width: 180px; height: 35px; font-size: 18px;">
      フォロー解除
    </button>
  </form>
@else
  {{-- 未フォロー：フォローボタン --}}
  <form method="POST" action="{{ route('follow', $user->id) }}">
    @csrf
    <button type="submit" class="btn btn-primary"
            style="width: 180px; height: 35px; font-size: 18px;">
      フォローする
    </button>
  </form>
@endif

    </div>

  </div>
@endforeach
</x-login-layout>
