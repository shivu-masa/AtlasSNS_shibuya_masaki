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

  <!--OGPタグ/twitterカード-->

   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
  <header>
    @include('layouts.navigation')
<nav class =g-navi>
    <div class="menu-btn" >
      <span class="inn"></span>

</div>
 <div class="menu">
    <ul>
    <li><h1></h1><a href="{{ route('top') }}">HOME</a></li>
    <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
    <li><a href="{{ route('logout') }}">ログアウト</a></li>
    </ul>
</div>
</nav>
  </header>
  <!-- Page Content -->

  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>
    <div id="side-bar">
      <div id="confirm">
        <p>〇〇さんの</p>
        <div>
          <p>フォロー数</p>

          <p>{{ Auth::user()->follows()->get()->count() }}
          名</p>
        </div>
        <p class="btn"><a href="{{ route('follow') }}">フォローリスト</a></p>
        <div>
          <p>フォロワー数</p>
          <p>{{ Auth::user()->follows()->get()->count() }}
          名</p>
        </div>
        <p class="btn"><a href="{{ route('follower') }}">フォロワーリスト</a></p>
      </div>
      <p class="btn"><a href="{{ route('users.search') }}">ユーザー検索</a></p>
    </div>
  </div>
  <footer>
  </footer>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
  <script src="{{ asset('js/function.js') }}"></script>
</body>

</html>
