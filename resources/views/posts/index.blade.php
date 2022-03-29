@extends('layouts.login')

@section('content')

<div id="posts">
    {!! Form::open(['url' => '/post/create']) !!}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <div class="posts-form">
        <img src="{{ asset('/storage/'.Auth::user()->images) }}" class="icon posts-icon">
        {!! Form::textarea('posts', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
      </div>
      <button  class="posts" type="submit"><img src="{{ asset('images/post.png') }}" class="post-image"></button>
    {!! Form::close() !!}
</div>

<div class="posts-list">
  @foreach($postsLists as $postsLists)
  <div class="posts-container">
    <div class="posts-content">
      <img src="{{ asset('/storage/'.$postsLists->user->images) }}" class="icon">
      <div class="posts-text">
        <p class="post-username">{{$postsLists->user->username}}</p>
        <p>{{$postsLists->post}}</p>
      </div>
      <div class="post_at">
        <p class="created_at">{{$postsLists->created_at}}</p>
      </div>
    </div>
    @if($postsLists->user_id === Auth::user()->id)
      <div class="post-buttons">
        <div class="edit">
          <a href="" class="edit-button"><img src="{{ asset('images/edit.png') }}" class="post-button"   onclick="editModal({{$postsLists->id}}); return false;"></a>
        </div>
        <div class="delete">
          <a href="/post/{{$postsLists->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
            <img src="{{ asset('images/trash-off.png') }}" class="post-button delete-button">
          </a>
        </div>
      </div>
      <!-- モーダル -->
      <div class="modal editModal-{{ $postsLists->id }}" id="EditModal">
        <div class="modal-windows">
          {!! Form::open(['url' => '/post/'.$postsLists->id.'/update']) !!}
          <div class="modal-form">
            {!! Form::textarea('posts', $postsLists->post, ['required', 'class' => 'update-form']) !!}
          </div>
          <button class="edit-done" type="submit"><img src="{{ asset('images/edit.png') }}" class="post-button edit-done"></button>
          {!! Form::close() !!}
        </div>
      </div>
    @endif
  </div>
  @endforeach
</div>


@endsection
