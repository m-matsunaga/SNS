<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\NewRegister;
// use App\Http\Requests\ValidationRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


// protected function validator(array $data)
// {
//     return Validator::make($data, $this->rules, $this->messages);
// }
    // public function index(){
    //     return view('/register');
    // }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */



    ///// 新規登録処理 /////

   protected function register(NewRegister $request){

            $username = $request->username;
            $mail = $request->mail;
            $password = $request->password;

            \DB::table('users')->insert([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            return view('auth.added',compact('username'));
        }

    // public function redirectPath()
    // {
    //     return '/login';
    // }


    public function createForm(){
        return view('auth.register');
    }

    public function createDone(){
        return view('auth.added');
    }


// \DB::table('users')->insert([
//   'username' => $username,
//   'mail' => $mail,
//   'password' => $password
// ]);

// $username = $request->input('username');
// $mail = $request->input('mail');
// $password = $request->input('password');

//createメソッド
// public function create(Request $request)
// {
    //     $post = $request->input('newPost');
    //     \DB::table('posts')->insert([
        //         'post' => $post
        //     ]);

        //     return redirect('index');
        // }

// public function registerForm(){
    //     return view("auth.register");
    // }

    // public function register(Request $request)
    // {
    //     // if($request->isMethod('post')){
    //     $data = $request->input(['username','mail','password']);
    //         // $this->create($data);
    //     \DB::table('users')->insert([
    //         'username'=>$data['username'],
    //         'mail'=>$data['mail'],
    //         'password'=>$data['password']
    //     ]);
    //     return view('auth.added');
    //     }

    // }

    //FM
    //    protected function post(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'username' => 'required|string|max:12|min:2',
    //         'mail' => 'required|string|email|max:40|min:5|unique:users',
    //         'password' => 'required|string|min:8|max:20|confirmed',
    //     ]);

    //     // $this->validate($request, $validated_rules);

        // $username = $validated_rules['username'];
        // $mail = $validated_rules['mail'];
        // $password = $validated_rules['password'];

    //     \DB::table('users')->insert([
    //         'username' => $validatedData['username'],
    //         'mail' => $validatedData['mail'],
    //         'password' => $validatedData['password']
    //     ]);

    //     return view('auth.added');
    // }
}
