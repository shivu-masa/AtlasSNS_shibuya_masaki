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
<header class="custom-header py-5 ml-3 px-4 d-flex justify-content-between align-items-center"
style="z-index: 2000; position: relative;">
  {{-- 左側ロゴ --}}
  <div id="head">
    <h1 class="mb-0">
      <a href="{{ route('top') }}">
        <img src="{{ asset('/images/atlas.png') }}" alt="Atlasロゴ" style="height: 60px; ">
      </a>
    </h1>
  </div>

  <div style="width: 100%; display: flex; justify-content: flex-end; margin-right: 20px;">
  <div class="accordion-container" style="position: relative;">
    <!-- トグルボタン -->
    <button
      id="accordionToggle"
      onclick="toggleAccordionMenu()"
      style="background-color:#007bff; padding: 14px 20px; font-size: 1.5rem; border: none; color: white; cursor: pointer;"
    >
      {{ Auth::user()->username }} さん
      <span id="arrowIcon" style="margin-left: 10px;">▼</span>
    </button>

    <!-- アコーディオンメニュー -->
    <ul id="accordionMenu"
        style="display: none; margin: 0; padding: 16px; list-style: none;
               background-color: #ffffff; border: 1px solid #ccc; border-radius: 6px;
               position: absolute; top: 100%; right: 0; width: 250px;
               box-shadow: 0 2px 8px rgba(0,0,0,0.2); z-index: 1000; font-size: 1.2rem;">
      <li style="padding: 10px 0;">
        <a href="{{ route('top') }}" style="text-decoration: none; color: #333; display: block; padding: 8px 12px; border-radius: 4px;"
           onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';"
           onmouseout="this.style.backgroundColor=''; this.style.color='#333';">
          HOME
        </a>
      </li>
      <li style="padding: 10px 0;">
        <a href="{{ route('profile') }}" style="text-decoration: none; color: #333; display: block; padding: 8px 12px; border-radius: 4px;"
           onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';"
           onmouseout="this.style.backgroundColor=''; this.style.color='#333';">
          プロフィール編集
        </a>
      </li>
      <li style="padding: 10px 0;">
        <a href="{{ route('logout') }}" style="text-decoration: none; color: #333; display: block; padding: 8px 12px; border-radius: 4px;"
           onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';"
           onmouseout="this.style.backgroundColor=''; this.style.color='#333';">
          ログアウト
        </a>
      </li>
    </ul>
  </div>
</div>


  {{-- アイコン画像（ユーザーのicon_image） --}}
  <img class="profile-image"
       src="{{ Auth::user()->icon_image ? asset('storage/' . Auth::user()->icon_image) : asset('images/default-user.png') }}"
       alt="プロフィール画像"
       style="width: 40px; height: 40px; border-radius: 50%;margin-top: 0px; object-fit: cover;margin-right: 40px;">
</div>
</header>

  {{--  サイドバー --}}
  <div id="side-bar"
     style="position: fixed;
            top: 0;
            right: 0;
            width: 240px;
            height: 100vh;
            background-color: #fff;
            color: #000;
            border-left: 1px solid #ccc;
            padding: 20px;
            padding-top: 220px;
            z-index: 500;
            overflow-y: auto;
            box-shadow: -2px 0 5px rgba(0,0,0,0.05);">
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
<script>
  function toggleAccordionMenu() {
    const menu = document.getElementById('accordionMenu');
    const arrow = document.getElementById('arrowIcon');

    const isOpen = menu.style.display === 'block';
    menu.style.display = isOpen ? 'none' : 'block';
    arrow.textContent = isOpen ? '▼' : '▲';
  }
</script>
</html>
