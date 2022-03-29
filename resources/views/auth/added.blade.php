@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="add-welcome">
    <p>{{$username}}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <div class="add-text">
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>
  </div>
  <p class="btn add-button"><a href="/" class="add-login">ログイン画面へ</a></p>
</div>

@endsection
