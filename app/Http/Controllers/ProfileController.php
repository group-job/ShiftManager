<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\ProfileRequst;
use Auth;

class ProfileController extends BaseController
{
    public function getShow()
    {
      
      return view('profile.show',compact('my_profile'));
    }

    public function getEdit()
    {
      return view('profile.edit');
    }

    // public function store(ProfileRequest $request)
    public function postStore(Request $request)
    {
      $user = User::find(Auth::user()->id);
      var_dump($request);
      // $value = $_REQUEST['value'];
      //パスワードの変更についての処理を追記 2016/01/08
      if(!empty($request->input('oldpassword')) && !empty($request->input('password'))){
        //現在のパスワードが一致しているかチェック
        if(Auth::attempt(['id' => $user->id, 'password' => $request->input('oldpassword')])){
          //パスワードの変更の場合は下記1行のSQLを実行
          $user->update(['password' => bcrypt($request->input('password'))]);
        }
      }else{
        //パスワード以外の変更処理
        $user->update($request->all());
      }
      // \Session::put('user_name', $request['name']);
    }


}
