<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\User;

class TestController extends Controller
{
    function test(){
    $data = array(
      'name'=>'kimiya',
      'email' => 'email',
      'password' => 'password',
      'phone1' => 'phone1',
      'phone2' => 'phone2',
      'phone3' => 'phone3'
    );
    var_dump($data);
    // var_dump(AuthController::Create($data));

    }


}
