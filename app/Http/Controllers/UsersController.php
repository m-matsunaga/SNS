<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Post;
use Illuminate\Support\Facades\Storage;
use App\Rules\AlphaRule;


class UsersController extends Controller
{
    //profile
    public function profile($userID){
        //users
        $userData = \App\User::where('id', $userID)
                        ->first();

        //users・posts
        $userPosts = \App\Post::with('user')
                        ->where('user_id', $userID)
                        ->latest()
                        ->get();

        return view('users.profile')->with([
            'userData' => $userData,
            'userPosts' => $userPosts,
          ]);
    }

    //search
    public function search(Request $request){
        $id = Auth::id();
        $search = $request->input('search');

        if (!empty($search)){
            $query = User::query();
            $users = $query->where('id','!=', $id)
                           ->where('username','like', '%' .$search. '%')->latest()->get();
            return view('users.search')->with([
            'users' => $users,
            'search' => $search
          ]);
        }
        return view('users.search');
    }

    // unFollow in search
    public function unFollow($followId){
        $id = Auth::id();
        \DB::table('follows')
            ->where('followed_id', $followId)
            ->where('following_id', $id)
            ->delete();

        return back();
    }

    // toFollow in search
    public function toFollow($followId){
        $id = Auth::id();
        \DB::table('follows')
            ->insert([
            'following_id' => $id,
            'followed_id' => $followId,
            ]);

        return back();
    }

    // unFollow in profile
    public function unFollowProfile($followId){
        $id = Auth::id();
        \DB::table('follows')
            ->where('followed_id', $followId)
            ->where('following_id', $id)
            ->delete();

        //users
        $userData = \App\User::where('id', $followId)
                        ->first();
        //users・posts
        $userPosts = \App\Post::with('user')
                        ->where('user_id', $followId)
                        ->latest()
                        ->get();

        return back()->with([
            'userData' => $userData,
            'userPosts' => $userPosts,
          ]);
    }

    // toFollow in profile
    public function toFollowProfile($followId){
        $id = Auth::id();
        \DB::table('follows')
            ->insert([
            'following_id' => $id,
            'followed_id' => $followId,
            ]);

        //users
        $userData = \App\User::where('id', $followId)
                        ->first();
        //users・posts
        $userPosts = \App\Post::with('user')
                        ->where('user_id', $followId)
                        ->latest()
                        ->get();

        return back()->with([
            'userData' => $userData,
            'userPosts' => $userPosts,
          ]);
    }

    public function myProfile(){
        return view('users.myProfile');
    }

    public $validateRules = [
            'username' => 'required|max:12|min:2',
            'mail' => 'required|email|max:40|min:5|unique:users',
            'password' => 'min:8|max:20|',
            'password-confirm' => 'same:password',
            'bio' => 'max:150',
            'images' => 'mimes:png,jpg,gif,bmp,svg'
        ];

    public $validateMessages = [
            'required' => '入力必須項目です',
            'username.max' => 'ユーザー名は2〜12文字以内で入力してください',
            'username.min' => 'ユーザー名は2〜12文字以内で入力してください',
            "email" => "メールアドレスの形式で入力してください。",
            'mail.max' => 'メールアドレスは5〜40文字以内で入力してください',
            'mail.min' => 'メールアドレスは5〜40文字以内で入力してください',
            'password.min' => 'パスワードは8〜20文字以内で入力してください',
            'password.max' => 'パスワードは8〜20文字以内で入力してください',
            'same' => 'パスワードが一致していません',
            'bio.max' => 'bioは150文字以内で入力してください',
            'images.mimes' => 'png・jpg・gif・bmp・svgのファイル形式のみアップロード可能です',
    ];

    public $imageValidate = [
        'images' => 'regex:/^[a-zA-Z0-9]+$/'
    ];

    public $imageError = [
        'images.regex' => '英数字のみのファイルをアップロードしてください',
    ];

    public function profileEdit(Request $request){
       //ファイル名バリデーション
        $image = $request->file('images')->getClientOriginalName();
        $imagesInfo = pathinfo($image, PATHINFO_FILENAME);
        $fileName = ['images' => $imagesInfo];

        $valImage = Validator::make(
            $fileName,
            $this->imageValidate,
            $this->imageError,
        );

        if($valImage->fails()){
            return back()->withErrors($valImage);

        } else {

        // $validatedImage = $valImage->validate();
        // $images = $validatedImage['images'];
        // echo $images;

        $data = $request->all();
        $val = Validator::make(
            $data,
            $this->validateRules,
            $this->validateMessages
        );

        //バリデーションNGの場合
        if($val->fails()){
            return back()->withErrors($val);

        //バリデーション成功の場合
        } else {
            $validated = $val->validate();
            $username = $validated['username'];
            $mail = $validated['mail'];
            $password = $validated['password'];
            $bio = $validated['bio'];
            $images = $validated['images']->store('public');
            $imageRename = basename($images);
            $id = Auth::id();

            \DB::table('users')
                ->where('id', $id)
                ->update([
                    'username' => $username,
                    'mail' => $mail,
                    'password' => bcrypt($password),
                    'bio' => $bio,
                    'images' => $imageRename,
                    ]);

                return back();

        }
    }
}
}
