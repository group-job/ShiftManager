<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request){
        // TODO 多重登録防止 mail is unique key !
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('mail'),
            'password' => bcrypt($request->input('password')),
            'phone1' => $request->input('phone1'),
            'phone2' => $request->input('phone2'),
            'phone3' => $request->input('phone3'),
        ]);
    }

    //ログインチェックーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function checkStatus(){
      return Auth::check();
    }

    // ログイン実行ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function login(Request $request){
      $email = $request->input('mail');
      $password = bcrypt($request->input('password'));
      echo $email."<br/>.$password";
      var_dump (Auth::attempt(['email' => $email, 'password' => $password]));
    }
}
