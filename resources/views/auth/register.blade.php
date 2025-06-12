
<x-logout-layout>

{{-- 登録フォーム --}}
  <div class="login-box">
    <h1>新規ユーザー登録</h1>

    {{-- バリデーションエラー --}}
    @if($errors->any())
      <div class="alert alert-danger text-start" style="color:white; background: rgba(255, 0, 0, 0.5); padding: 10px; border-radius: 5px;">
        <ul style="margin-bottom: 0;">
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {!! Form::open(['url' => '/create']) !!}

      {{ Form::label('username', 'ユーザー名') }}
      {{ Form::text('username', null, ['class' => 'form-control']) }}

      {{ Form::label('email', 'メールアドレス') }}
      {{ Form::email('email', null, ['class' => 'form-control']) }}

      {{ Form::label('password', 'パスワード') }}
      {{ Form::password('password', ['class' => 'form-control']) }}

      {{ Form::label('password_confirmation', 'パスワード確認') }}
      {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

      {{ Form::submit('登録', ['class' => 'btn btn-primary btn-submit']) }}

    {!! Form::close() !!}

    <div class="login-link">
      <a href="{{ url('login') }}">ログイン画面へ戻る</a>
    </div>
  </div>
</x-logout-layout>
