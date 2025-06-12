<x-login-layout>

<div class="container">
    <h2>プロフィール編集</h2>

    {{-- プロフィール画像の表示 --}}
    <div class="mb-3 text-center">
        <img src="{{ $user->icon_image ? asset('storage/' . $user->icon_image) : asset('images/default-icon.png') }}"
             alt="プロフィール画像"
             class="rounded-circle"
             style="width: 100px; height: 100px;">
    </div>

    {{-- プロフィール編集フォーム --}}
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- ユーザー名 --}}
    <div class="mb-3">
        <label for="username">ユーザー名</label>
        <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
    </div>

    {{-- メールアドレス --}}
    <div class="mb-3">
        <label for="email">メールアドレス</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
    </div>

    {{-- パスワード（空欄で変更しない） --}}
    <div class="mb-3">
        <label for="password">パスワード</label>
        <input type="password" name="password" class="form-control" placeholder="変更しない場合は空欄でOK">
    </div>

    {{-- パスワード確認 --}}
    <div class="mb-3">
        <label for="password_confirmation">パスワード確認</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    {{-- 自己紹介 --}}
    <div class="mb-3">
        <label for="bio">自己紹介</label>
        <textarea name="bio" class="form-control" rows="3">{{ old('bio', $user->bio) }}</textarea>
    </div>

    {{-- アイコン画像 --}}
    <div class="mb-3">
        <label for="icon_image">アイコン画像</label><br>
        <img src="{{ $user->icon_image ? asset('storage/' . $user->icon_image) : asset('images/default-icon.png') }}"
             class="rounded-circle mb-2" style="width: 80px; height: 80px;">
        <input type="file" name="icon_image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">更新</button>
</form>
</div>

</x-login-layout>
