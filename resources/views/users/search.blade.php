@extends('layouts.login')

@section('content')

<!-- 検索画面 -->
<div id="search">
  <div class="search-top">
    {!! Form::open(['url' => '/user/search']) !!}
      <div class="search-form-container">
        {!! Form::search('search', null, ['class' => 'search-form', 'placeholder' => 'ユーザー名']) !!}
      </div>
      <button type="search"><img src="{{ asset('images/search.png') }}" class="search-icon"></button>
    {!! Form::close() !!}
    @if(!empty($_POST["search"]))
      <p class="search-word">検索ワード：{{$search}}</p>
    @endif
  </div>
</div>

<!-- 結果リスト -->
<div class="users-list">
  <!-- 検索ワードあり -->
  @if(!empty($_POST["search"]))
    @foreach($users as $user)
    <div class="user-container">
      <img src="{{ asset('images/'.$user->images) }}" class="icon">
      <p>{{$user->username}}</p>
        @if(in_array($user->id , array_column($followingUsers , 'followed_id')))
          <a href="/user/{{$user->id}}/un_follow" class="un-follow" onclick="return confirm('本当にフォローを解除しますか？')"><p>フォロー解除</p></a>
        @else
          <a href="/user/{{$user->id}}/to_follow" class="to-follow" onclick="return confirm('本当にフォローしますか？')"><p>フォローする</p></a>
        @endif
    </div>
    @endforeach
  <!-- 検索ワードなし -->
  @else
    @foreach($userExceptMes as $userExceptMe)
    <div class="user-container">
      <img src="{{ asset('images/'.$userExceptMe->images) }}" class="icon user-icon">
      <p class="user-name">{{$userExceptMe->username}}</p>
        @if(in_array($userExceptMe->id , array_column($followingUsers , 'followed_id')))
          <a href="/user/{{$userExceptMe->id}}/un_follow" class="un-follow" onclick="return confirm('本当にフォローを解除しますか？')"><p>フォロー解除</p></a>
        @else
          <a href="/user/{{$userExceptMe->id}}/to_follow" class="to-follow" onclick="return confirm('本当にフォローしますか？')"><p>フォローする</p></a>
        @endif
    </div>
    @endforeach
  @endif
</div>

@endsection
