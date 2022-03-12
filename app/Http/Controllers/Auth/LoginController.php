<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        if ($request->isMethod('post')) {

            $mail = $request->input('mail');
            $password = $request->input('password');

            $users = \DB::table('users')->where('mail', $mail)->get();

            if($password === $users['password']){
                return view('posts.index');
            } else {
                return view("auth.login");
            }

        }

        //     if (Auth::attempt($authinfo)){
        //         return view('posts.index');
        //     } else {
        //         echo 'ログインに失敗しました';
        //     }
        // }

        // // $mail = $request->input('mail');
        // // $password = $request->input('password');


        // //     // ログインが成功したら、トップページへ
        // //     //↓ログイン条件は公開時には消すこと
        // //     if(Auth::attempt(['mail' => $mail, 'password' => $password])){
        // //         $user = Auth::user($request);
        // //         return view('posts.index');
        // //     }

        // return view("auth.login");
    }

        public function loginPage(){
        return view('auth.login');
    }
}
