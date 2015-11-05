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
      $message = '';
      if(AuthController::checkStatus()){
        //既ログイン→homeにリダイレクト
          return redirect('group/home');
      }else {
          return view('home.index');
      }

    }
}
