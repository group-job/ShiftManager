<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shift

class PersonalController extends Controller
{
    // ログイン画面へアクセスされたときーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function getHome(){
      var_dump(Shift::all());
      return view('personal.home');
    }
}
