@extends('layouts.login')

@section('content')

<div id="follow">
  <div class="follow-top">
    <h1 class="follow-list">Follow List</h1>
    <div class="follow-icon">
      @foreach($followingUsersAlls as $followingUsersAll)
        <a href="/profile/{{$followingUsersAll->id}}" class="follow-iconList"><img src="{{ asset('/storage/'.$followingUsersAll->images) }}" class="icon"></a>
      @endforeach
    </div>
  </div>
</div>

<div class="follow-post">
  @foreach($postsListsExceptMes as $postsListsExceptMe)
    <div class="posts-container">
      <div class="posts-content">
        <a href="/profile/{{$postsListsExceptMe->user->id}}"><img src="{{ asset('/storage/'.$postsListsExceptMe->user->images) }}" class="icon"></a>
        <div class="posts-text">
          <p class="post-username">{{$postsListsExceptMe->user->username}}</p>
          <p>{{$postsListsExceptMe->post}}</p>
        </div>
        <div class="post_at">
          <p class="created_at">{{$postsListsExceptMe->created_at}}</p>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection
