<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
        $id = Auth::id();
        //フォロー数取得
        $following = DB::table('follows')->where('following_id', '=', $id)->count();
        //フォロワー数取得
        $followed = DB::table('follows')->where('followed_id', '=', $id)->count();

        //フォローした人のデータ(follow)
        $followingUsers = DB::table('follows')->select('followed_id')->where('following_id', '=', $id)->get()->toArray();

        // フォローした人のデータ(Users連携)
        $followingUsersAlls= \App\User::whereIn('id',function($query) {
                                $id = Auth::id();
                                $query->select('followed_id')
                                      ->from('follows')
                                      ->where('following_id', $id);
                                })
                                ->get();

        //フォローした人のデータ（自分以外）(post連携)
        $postsListsExceptMes = \App\Post::where('user_id','!=', $id)
                        ->WhereIn('user_id', function($query) {
                        $id = Auth::id();
                        $query->select('followed_id')
                              ->from('follows')
                              ->where('following_id', $id);
                        })
                        ->latest()
                        ->get();

        //フォローした人のデータ(post連携)
        $postsLists = \App\Post::where('user_id', $id)
                        ->orWhereIn('user_id', function($query) {
                        $id = Auth::id();
                        $query->select('followed_id')
                              ->from('follows')
                              ->where('following_id', $id);
                        })
                        ->latest()
                        ->get();

        // フォロワーのデータ(Users連携)
        $followerUsersAlls= \App\User::whereIn('id',function($query) {
                                $id = Auth::id();
                                $query->select('following_id')
                                      ->from('follows')
                                      ->where('followed_id', $id);
                                })
                                ->get();

        //フォロワーのデータ（自分以外）(post連携)
        $followerPosts = \App\Post::where('user_id','!=', $id)
                        ->WhereIn('user_id', function($query) {
                        $id = Auth::id();
                        $query->select('following_id')
                              ->from('follows')
                              ->where('followed_id', $id);
                        })
                        ->latest()
                        ->get();

        //自分以外のユーザー
        $userExceptMes = DB::table('users')->where('id','!=', $id)->latest()->get();

        $view->with([
       "following" => $following,
       "followed" => $followed,
       "postsLists" => $postsLists,
       "userExceptMes" => $userExceptMes,
       "followingUsers" => $followingUsers,
       "followingUsersAlls" => $followingUsersAlls,
       "postsListsExceptMes" => $postsListsExceptMes,
       "followerUsersAlls" => $followerUsersAlls,
       "followerPosts" => $followerPosts,

        ]);
        });
    }
}
