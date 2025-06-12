<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap 5 JS (モーダル用) -->



   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
<header class="custom-header py-5 ml-3 px-4 d-flex justify-content-between align-items-center">
  {{-- 左側ロゴ --}}
  <div id="head">
    <h1 class="mb-0">
      <a href="{{ route('top') }}">
        <img src="{{ asset('/images/atlas.png') }}" alt="Atlasロゴ" style="height: 60px; ">
      </a>
    </h1>
  </div>

  <div class="d-flex align-items-center gap-3">
  {{-- Bootstrap ドロップダウン --}}
  <div class="dropdown">
    <button
      class="btn btn-outline-light dropdown-toggle"
      type="button"
      id="userMenuButton"
      data-bs-toggle="dropdown"
      aria-expanded="false"
      style="padding: 10px 16px; font-size: 1.1rem; line-height: 1.2;"
    >
      {{ Auth::user()->username }} さん
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuButton">
      <li><a class="dropdown-item" href="{{ route('top') }}">HOME</a></li>
      <li><a class="dropdown-item" href="{{ route('profile') }}">プロフィール編集</a></li>
      <li><a class="dropdown-item" href="{{ route('logout') }}">ログアウト</a></li>
    </ul>
  </div>

  {{-- アイコン画像（ユーザーのicon_image） --}}
  <img class="profile-image"
       src="{{ Auth::user()->icon_image ? asset('storage/' . Auth::user()->icon_image) : asset('images/default-user.png') }}"
       alt="プロフィール画像"
       style="width: 40px; height: 40px; border-radius: 50%;margin-top: 0px; object-fit: cover;">
</div>
</header>

  {{--  サイドバー --}}
  <div id="side-bar" style="position: fixed; top: 130px; right: 0; width: 240px; height: calc(100% - 100px); background-color: #fff; color: #000; border-left: 1px solid #ccc; padding: 20px;  overflow-y: auto;">
  <div id="confirm">
    <p class="fw-bold mb-3">{{ Auth::user()->username }} さんの</p>

    <div class="mb-4">
      <p class="mb-1">フォロー数</p>
      <p class="mb-1">{{ Auth::user()->followings()->count() }} 名</p>
      <a href="{{ route('followList') }}" class="btn btn-primary btn-sm w-100">フォローリスト</a>
    </div>

    <div class="mb-4 border-top pt-3">
      <p class="mb-1">フォロワー数</p>
      <p class="mb-1">{{ Auth::user()->followers()->count() }} 名</p>
      <a href="{{ route('followerList') }}" class="btn btn-primary btn-sm w-100">フォロワーリスト</a>
    </div>

    <div class="border-top pt-3">
      <a href="{{ route('users.search') }}" class="btn btn-primary btn-sm w-100">ユーザー検索</a>
    </div>
  </div>
</div>

  <!-- Page Content -->
  <div id="container">
    {{ $slot }}
  </div>

  <footer></footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
  <script src="{{ asset('js/function.js') }}"></script>
</body>

</html>
