<x-logout-layout>
{{-- メッセージボックス --}}
  <div class="login-box">
    @if (session('username'))
      <h2>{{ session('username') }}さん！</h2>
    @endif

    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>

    <a href="{{ url('login') }}" class="btn btn-primary btn-submit" style="display:block; margin-top:20px;">ログイン画面へ</a>
  </div>
</div>
</x-logout-layout>
