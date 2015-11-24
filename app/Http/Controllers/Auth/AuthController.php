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
    public function postRegister(Request $request){
        // TODO 多重登録防止 mail is unique key !
        // TODO 入力チェック
        // TODO 登録失敗処理
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('mail'),
            'password' => bcrypt($request->input('password')),
        ]);
        Auth::login($user);
        return redirect('/personal/home');
    }

    //ログインチェックーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public static function checkStatus(){
      return Auth::check();
    }

    // ログイン実行ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public static function postLogin(Request $request){
      $email = $request->input('mail');
      $password = $request->input('password');
      if(Auth::attempt(['email' => $email, 'password' => $password])){
        //ログイン成功
        return redirect()->intended('/personal/home');
      }
      else {
        // ログイン失敗
        die('kimiya');
        return back()->withInput();
      }
    }
    //ログアウト処理してログイン画面へリダイレクト
    public function getLogout(){
      Auth::logout();
      return redirect('/');
    }
    //ログイン画面へリダイレクト(/loginのルーティングが標準で実装しているため)
    public function getLogin(){
      return redirect('/');
    }
}
