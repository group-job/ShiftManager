<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class IndexController extends Controller
{
    // ログイン画面へアクセスされたとき
    public function index()
    {
      if (Session::has('user')){
        //既ログイン
        $this->redirectToHome();
      }else {
        //未ログイン
        $this->redirectToLogin();
      }
    }

    // ログイン実行
    public function executeLogin(){
      // ログイン処理
      $input_name = Request::input('name');
      $input_pass = Request::input('pass');

      if($input_name != '' && $input_pass != ''){
        //入力値がからじゃない場合DBから対応するユーザーのパス取得
        $pass = User::where('name', '=', $input_name)->first().pass;
        if($pass === $input_pass){
          // 成功
          $this->redirectToHome();
        }
        else {
          // 失敗
          $this->redirectToLogin();

      }



      }

    }

    // ログイン画面にリダイレクト
    public function redirectToLogin($message = null){
      return view('home.index');
    }

    //ホーム画面へリダイレクト
    public function redirectToHome(){
      //ユーザー

    }


}
