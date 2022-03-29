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

// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ

// Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

// Route::post('/login', 'Auth\LoginController@showLoginForm');
// Route::get('/login', 'Auth\LoginController@showLoginForm');

// Route::get('/auth/login', 'Auth\LoginController@login');
// Route::post('/auth/login', 'Auth\LoginController@login');


//// Login前
Route::group(['middleware' => ['guest']], function () {

    // Login
    Route::get('/','Auth\AuthController@showLogin')->name('showLogin');
    Route::get('login','Auth\AuthController@login')->name('login');
    Route::post('login','Auth\AuthController@login')->name('login');

    // Register
    Route::get('/register', 'Auth\RegisterController@register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/register/form', 'Auth\RegisterController@createForm');

    // Add
    Route::get('/added', 'Auth\RegisterController@createDone');
    Route::post('/added', 'Auth\RegisterController@createDone');

});

//// Login中
Route::group(['middleware' => ['auth']], function () {

    //Home
    Route::get('/home','PostsController@index')->name('home');
    Route::post('/home','PostsController@index')->name('home');

    //logout
    Route::get('logout','Auth\AuthController@logout')->name('logout');

    //profile
    Route::get('/profile','UsersController@profile');

    //search
    Route::get('/user/search','UsersController@search');
    Route::post('/user/search','UsersController@search');

    //posts
    Route::post('/post/create','PostsController@create');
    Route::post('/post/{id}/update','PostsController@update')->name('posts.update');

    //delete
    Route::get('post/{id}/delete', 'PostsController@delete');

    // follow
    Route::get('/user/{followId}/un_follow', 'UsersController@unFollow');
    Route::get('/user/{followId}/to_follow', 'UsersController@toFollow');

    // follow in profile
    Route::get('/user/profile/{followId}/un_follow', 'UsersController@unFollowProfile');
    Route::get('/user/profile/{followId}/to_follow', 'UsersController@toFollowProfile');

    // follow List
    Route::get('/follow-list','PostsController@follows');
    Route::get('/follower-list','PostsController@followers');

    // profile
    Route::get('/profile/{userID}','UsersController@profile');
    Route::get('/profile','UsersController@myProfile');
    Route::post('/profile/edit','UsersController@profileEdit');

});
