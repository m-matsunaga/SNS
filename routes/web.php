<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@loginPage');
Route::post('/login', 'Auth\LoginController@loginPage');

Route::get('/auth/login', 'Auth\LoginController@login');
Route::post('/auth/login', 'Auth\LoginController@login');


Route::get('/register', 'Auth\RegisterController@post');
Route::post('/register', 'Auth\RegisterController@post');

// Route::post('/register', 'UsersController@post');
// Route::get('/register', 'Auth\UsersController@post');

Route::get('/added', 'Auth\RegisterController@createDone');
Route::post('/added', 'Auth\RegisterController@createDone');

Route::get('/register/form', 'Auth\RegisterController@createForm');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

//user新規登録関連
Route::post('/user/create','RegisterController@create');
Route::post('/user/register','RegisterController@register');
