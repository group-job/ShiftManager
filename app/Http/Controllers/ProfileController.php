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
      // var_dump($user);
      // $value = $_REQUEST['value'];
      $user->update($request->all());
      // \Session::put('user_name', $request['name']);
    }


}
