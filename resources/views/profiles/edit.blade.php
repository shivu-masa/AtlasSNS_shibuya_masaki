<x-login-layout>

<div class="container">



    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- ユーザーアイコンとユーザー名 --}}
        <div class="row form-row align-items-center">
  {{-- アイコン画像（左端） --}}
  <div class="col-auto d-flex align-items-center" style="width: 40px; height: 40px; margin-left: -50px;">
  <img src="{{ Auth::user()->icon_image && file_exists(public_path('storage/' . Auth::user()->icon_image))
              ? asset('storage/' . Auth::user()->icon_image)
              : asset('images/icon1.png') }}"
       alt="プロフィール画像"
       class="rounded-circle"
       style="width: 40px; height: 40px;">
</div>

<div class="col-auto d-flex align-items-center" style="font-weight: 600; font-size: 1.1rem; margin-left: 10px;">
  <label for="username" class="mb-0">ユーザー名</label>
</div>

  {{-- テキストボックス --}}
  <div class="col" style="margin-left: 270px;">
    <input type="text" name="username" class="form-control"
           value="{{ old('username', $user->username) }}" required>
    @error('username')
      <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
</div>
        {{-- メールアドレス --}}
        <div class="row form-row align-items-center">
            <label for="email" class="col-md-3 form-label">メールアドレス</label>
            <div class="col-md-9">
                <input type="email" name="email" class="form-control"
                       value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- パスワード --}}
        <div class="row form-row align-items-center">
            <label for="password" class="col-md-3 form-label">パスワード</label>
            <div class="col-md-9">
                <input type="password" name="password" class="form-control">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- パスワード確認 --}}
        <div class="row form-row align-items-center">
            <label for="password_confirmation" class="col-md-3 form-label">パスワード確認</label>
            <div class="col-md-9">
                <input type="password" name="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- 自己紹介 --}}
        <div class="row form-row align-items-center">
            <label for="bio" class="col-md-3 form-label">自己紹介</label>
            <div class="col-md-9">
                <textarea name="bio" class="form-control" rows="2">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- アイコン画像ファイル --}}
        <div class="row form-row align-items-center">
            <label for="icon_image" class="col-md-3 form-label">アイコン画像</label>
            <div class="col-md-9 text-center">
                <input type="file" name="icon_image" class="form-control">
                @error('icon_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- 更新ボタン --}}
        <div class="d-flex  mt-4 mb-5">
    <button type="submit" class="btn btn-danger btn-sm"
            style="width: 100px; height: 30px; padding: 0; font-size: 0.75rem; position: relative; left: 500px;">
        更新
    </button>
</div>
    </form>

</div>
</x-login-layout>
