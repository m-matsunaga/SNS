@extends('layouts.login')

@section('content')

<div id="follow">
  <div class="follow-top">
    <h1 class="follow-list">Follower List</h1>
    <div class="follow-icon">
      @foreach($followerUsersAlls as $followerUsersAll)
        <a href="/profile/{{$followerUsersAll->id}}" class="follow-iconList"><img src="{{ asset('/storage/'.$followerUsersAll->images) }}" class="icon"></a>
      @endforeach
    </div>
  </div>
</div>

<div class="follow-post">
  @foreach($followerPosts as $followerPost)
    <div class="posts-container">
      <div class="posts-content">
        <a href="/profile/{{$followerPost->user->id}}"><img src="{{ asset('/storage/'.$followerPost->user->images) }}" class="icon"></a>
        <div class="posts-text">
          <p class="post-username">{{$followerPost->user->username}}</p>
          <p>{{$followerPost->post}}</p>
        </div>
        <div class="post_at">
          <p class="created_at">{{$followerPost->created_at}}</p>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection
