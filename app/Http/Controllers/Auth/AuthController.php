<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidationRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //ログイン画面表示
    public function showLogin(){
        return view('auth.login_form');
    }

    //ログイン機能
    public function login(ValidationRequest $request){

        $credentials = $request->only('mail', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('home');
        }

        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています'
        ]);
    }

    //ログアウト
    public function logout(){
        Auth::logout();
        return redirect()->route('showLogin');
    }

}
