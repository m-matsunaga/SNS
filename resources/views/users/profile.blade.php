@extends('layouts.login')

@section('content')

<div id="profile">
  <div class="profile-user">
    <img src="{{ asset('images/'.$userData->images) }}" class="icon profile-icon">
    <div class="profile-text">
      <div class="profile-name">
        <p class="profile-elem">NAME</p><p>{{$userData->username}}</p>
      </div>
      <div class="profile-bio">
        <p class="profile-elem">BIO</p><p>{{$userData->bio}}</p>
      </div>
    </div>
    <div class="profile-follow">
  @if(in_array($userData->id , array_column($followingUsers , 'followed_id')))
    <a href="/user/profile/{{$userData->id}}/un_follow" class="un-follow" onclick="return confirm('本当にフォローを解除しますか？')"><p>フォロー解除</p></a>
  @else
    <a href="/user/profile/{{$userData->id}}/to_follow" class="to-follow" onclick="return confirm('本当にフォローしますか？')"><p>フォローする</p></a>
  @endif
    </div>
  </div>
</div>

<div class="posts-list">
  @foreach($userPosts as $userPost)
  <div class="posts-container">
    <div class="posts-content">
      <img src="{{ asset('images/'.$userPost->user->images) }}" class="icon">
      <div class="posts-text">
        <p class="post-username">{{$userPost->user->username}}</p>
        <p>{{$userPost->post}}</p>
      </div>
      <div class="post_at">
        <p class="created_at">{{$userPost->created_at}}</p>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
