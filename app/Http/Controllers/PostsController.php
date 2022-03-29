<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Post;

class PostsController extends Controller
{

    public function index(){
        return view('posts.index');
    }

    public function follows(){
        return view('follows.followList');
    }

    public function followers(){
        return view('follows.followerList');
    }

    //////////　新規投稿　//////////
    public function create(Request $request){
       //バリデーション
        $validatedData = Validator::make($request->all(),[
            'posts' => 'required|max:200|min:1',
        ],[
        'posts' => '入力必須です。1〜200文字以内で入力してください',
    ]);
        //バリデーション失敗
        if ($validatedData->fails()) {
            return back()->withErrors($validatedData);

    } else {
            $validated = $validatedData->validate();
            $posts = $validated['posts'];
            $id = Auth::id();

            \DB::table('posts')->insert([
                'user_id' => $id,
                'post' => $posts,
            ]);

            // $postsList = Post::with('user')->get();
            return redirect()->route('home');
            // ,compact('postsList')
        }
    }

    //////////　投稿更新　//////////
    public function update(Request $request, $id){
        $up_post = $request->input('posts');

        \DB::table('posts')
            ->where('id', $id)
            ->update(['post' => $up_post]);

        return back();
    }




    //////////　投稿削除　//////////
    public function delete($id){

        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect()->route('home');
    }
}
