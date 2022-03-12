@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('user name') }}
{{ Form::text('username',null,['required','class' => 'input']) }}

{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['required','class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password',null,['required','class' => 'input']) }}

{{ Form::label('password comfirm') }}
{{ Form::password('password-confirm',null,['required','class' => 'input']) }}

{{ Form::submit('REGISTER') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
