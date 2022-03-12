@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/auth/login']) !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register/form">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
