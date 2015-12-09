<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\ProfileRequst;

class ProfileController extends BaseController
{
    public function getShow()
    {
      \Session::put('user_name', 'きみや');
      \Session::put('user_id', '1');
      $my_profile = User::find();
      // foreach ($my_profile as $key => $value) {
      //   echo $value["name"];
      // }
      // die($my_profile);
      //   // die($manage_group);
      //   return $manage_group
      // \Session::put('user_name');
      return view('profile.show',compact('my_profile'));
    }

    public function getEdit()
    {
      return view('profile.edit');
    }

    // public function store(ProfileRequest $request)
    public function postStore(Request $request)
    {
      $user = User::myProfile()->find(1);
      // var_dump($user);
      // $value = $_REQUEST['value'];
      $user->update($request->all());
      // \Session::put('user_name', $request['name']);
    }


}
