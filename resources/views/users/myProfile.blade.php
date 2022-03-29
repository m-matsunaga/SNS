@extends('layouts.login')

@section('content')

<div class="my-profile">
  <div class="myProfile-container">
    <div class="my-icon">
      <img src="{{ asset('/storage/'.Auth::user()->images) }}" class="icon">
    </div>
    <div class="profile-edit">
      {!! Form::open(['url' => '/profile/edit', 'files' => true]) !!}
        <div class="edit-forms">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <!-- username -->
          <div class="edit-content">
          {{ Form::label('username', 'user name', ['class'=>'edit-label']) }}
          {!! Form::text('username', Auth::user()->username, ['required', 'class' => 'edit-form', 'placeholder' => 'ユーザー  名を入力してください']) !!}
          </div>
          <!-- mail address -->
          <div class="edit-content">
          {{ Form::label('mail', 'mail address', ['class'=>'edit-label']) }}
          {!! Form::text('mail', Auth::user()->mail, ['required', 'class' => 'edit-form', 'placeholder' => 'メールアドレスを入  力してください']) !!}
          </div>
          <div class="edit-content">
          {{ Form::label('password', 'password', ['class'=>'edit-label']) }}
          {!! Form::password('password',['class' => 'edit-form', 'placeholder' => 'パスワードを入力してください'])  !!}
          </div>
          <div class="edit-content">
          {{ Form::label('password-confirm', 'password confirm', ['class'=>'edit-label']) }}
          {!! Form::password('password-confirm',['class' => 'edit-form', 'placeholder' => 'パスワードを再度入力して ください']) !!}
          </div>
          <div class="edit-content profile-textarea">
          {{ Form::label('bio', 'bio', ['class'=>'edit-label']) }}
          {!! Form::textarea('bio', Auth::user()->bio, ['class' => 'edit-form edit-textarea', 'placeholder' => 'bioを入力してく ださい']) !!}
          </div>
          <div class="edit-content">
          {{ Form::label('images', 'icon image', ['class'=>'edit-label']) }}
          {!! Form::file('images',['required','class' => 'edit-form', 'placeholder' => 'ファイルを選択']) !!}
          </div>
        </div>
        <button class="edit-submit" type="submit">更新</button>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
