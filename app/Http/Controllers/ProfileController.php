<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function show()
    {
      \Session::put('user_name', 'きみや');
      \Session::put('user_id', '1');
      // $my_profile = User::myProfile()->find(1);
      // foreach ($my_profile as $key => $value) {
      //   echo $value["name"];
      // }
      // die($my_profile);
      //   // die($manage_group);
      //   return $manage_group
      // \Session::put('user_name');
      return view('profile.show',compact('my_profile'));
    }

    public function edit()
    {
      return view('profile.edit');
    }


}
