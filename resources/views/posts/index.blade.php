<x-login-layout>

<div class="postbox d-flex align-items-start mb-4">
  {{-- ログインユーザーのプロフィール画像 --}}
  @if (Auth::user()->icon_image)
    <img class="profile-image me-3"
         src="{{ asset('storage/' . Auth::user()->icon_image) }}"
         alt="プロフィール画像">
  @else
    <img class="profile-image me-3"
         src="{{ asset('images/default-icon.png') }}"
         alt="デフォルト画像">
  @endif

  {{-- 投稿フォーム --}}
  <form method="POST" action="{{ url('/posts') }}" class="position-relative w-100">
    @csrf
    <textarea name="post" class="post-input" placeholder="投稿内容を入力してください" required></textarea>

    {{-- 投稿ボタン --}}
    <button type="submit" class="post-submit-btn">
      <img src="{{ asset('images/post.png') }}" alt="投稿" class="post-icon">
    </button>
  </form>
</div>
<div class="post-separator"></div>

<!-- 投稿一覧 -->
<div class="posts-list" style="margin-left: 100px;" >
  @foreach ($posts as $post)

    <div class="d-flex align-items-start mb-5" style="position: relative;">

      <!-- プロフィール画像 -->
      <a href="{{ route('profile.id', ['id' => $post->user->id]) }}">
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

      <!-- ユーザー名と投稿内容 -->
      <div class="ms-3">
        <strong>{{ $post->user->username }}</strong><br>
        {{ $post->post }}<br>
        <small class="text-muted">投稿日時：{{ $post->created_at->format('Y/m/d H:i') }}</small>
      </div>

      <!-- 自分の投稿にだけボタンを表示 -->
      @if (Auth::id() === $post->user->id)
        <div class="d-flex align-items-center" style="position: absolute; right: 0; top: 0;">
          <!-- 編集ボタン -->
          <button type="button" class="edit-button me-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $post->id }}" style="border:none; background:none; padding:0;">
            <img src="{{ asset('images/edit.png') }}" style="width:30px; height:30px;margin-left: -350px;">
          </button>

          <!-- 削除ボタン -->
          <button type="button" class="trash-button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $post->id }}"
        style="border:none; background:none; padding:0;">
  <img src="{{ asset('images/trash.png') }}"
       style="width:30px; height:30px; margin-left: -320px;"
       onmouseover="this.src='{{ asset('images/trash-h.png') }}'"
       onmouseout="this.src='{{ asset('images/trash.png') }}'">
</button>
        </div>
      @endif
    </div>
    <div class="post-separator2"></div>

    <!-- 編集モーダル -->
    <div class="modal fade" id="editModal{{ $post->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ route('post.update', $post->id) }}">
        @csrf
        @method('PUT')

        <div class="modal-body">
          <textarea name="post" class="form-control" rows="3" required>{{ $post->post }}</textarea>
        </div>


        <div class="modal-footer justify-content-center">
          <button type="submit" style="
            background: transparent;
            border: none;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
          ">
            <img src="{{ asset('images/edit.png') }}" alt="更新" style="width: 30px; height: 30px;">
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- 削除モーダル -->
<div class="modal fade" id="deleteModal{{ $post->id }}">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="{{ route('post.destroy', $post->id) }}">
        @csrf
        @method('DELETE')

        <div class="modal-body text-center" style="font-size: 16px; padding: 20px;">
  本当にこの投稿を削除してよろしいですか？
</div>

        <div class="modal-footer d-flex justify-content-center gap-3">
  <button type="submit" class="btn btn-danger" style="width: 50px; height: 30px;">OK</button>
  <button type="button" class="btn btn-secondary " data-bs-dismiss="modal" style="width: 50px; height: 30px;">キャンセル</button>
</div>
      </form>

    </div>
  </div>
</div>
  @endforeach
</div>
</x-login-layout>
