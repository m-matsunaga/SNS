@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}

<h2 class="welcome new-user">新規ユーザー登録</h2>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="login-form">
{{ Form::label('user name') }}
{{ Form::text('username',old('username'),['required','class' => 'input']) }}

{{ Form::label('mail adress') }}
{{ Form::text('mail',old('mail'),['required','class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password',null,['required','class' => 'input']) }}

{{ Form::label('password comfirm') }}
{{ Form::password('password-confirm',null,['required','class' => 'input']) }}

{{ Form::submit('REGISTER',['class' => 'submit']) }}

<p class="to-register"><a href="/"  class="link-register">ログイン画面へ戻る</a></p>
</div>
{!! Form::close() !!}


@endsection
