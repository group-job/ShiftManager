<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class IndexController extends Controller
{
    // ログイン画面へアクセスされたときーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function index()
    {
    //ログイン済みかチェック
    return view('home.index');
    }



    // ログイン画面にリダイレクトーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function redirectToLogin($message = null){
      return view('home.index',compact('message'));
    }

    //ホーム画面へリダイレクトーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function redirectToHome(){
      //ユーザー情報をセッションに格納


    }

    public function test(){
      echo "kimiya";
    }


}
