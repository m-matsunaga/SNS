@extends('layouts.logout')

@section('content')

{!! Form::open(['route' => 'login']) !!}

<p class="welcome">AtlasSNSへようこそ</p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('login_error'))
  <div class="alert alert-danger">
    {{session('login_error')}}
  </div>
@endif
<div class="login-form">
{{ Form::label('mail adress') }}
{{ Form::text('mail',old('mail'),['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
{{ Form::submit('LOGIN',['class' => 'submit']) }}
</div>

<p class="to-register"><a href="/register/form" class="link-register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
