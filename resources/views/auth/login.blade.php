<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  <div class="login-box">
  <h1>AtlasSNSへようこそ</h1>

  {!! Form::open(['url' => 'login']) !!}

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control']) }}

    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control']) }}

    {{ Form::submit('ログイン', ['class' => 'btn btn-primary btn-submit']) }}

    <div class="login-link">
      <a href="{{ url('register') }}">新規ユーザーの方はこちら</a>
    </div>

  {!! Form::close() !!}
</div>


</x-logout-layout>
