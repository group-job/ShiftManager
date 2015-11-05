<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\User;

class IndexController extends Controller
{
    // ログイン画面へアクセスされたときーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function index(){
      if(AuthController::checkStatus()){
        //既ログイン→homeにリダイレクト
          return redirect('user/login');
      }else {
          return view('home.index',$message);
      }

    }
}
