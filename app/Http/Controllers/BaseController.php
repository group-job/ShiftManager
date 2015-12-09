<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employment;
use App\Group;
use App\Chat;
use Auth;
use View;

class BaseController extends Controller
{
  public function __construct()
  {
    //管理グループ取得
    $manager_group = Group::where('manager_id','=',Auth::user()->id)->get();
    if (isset($manager_group)) {
        View::share('manager_group',$manager_group);
    }

    //雇用取得
    $employment = Auth::user()->joiningEmployments;
    //雇用からグループ取得
    if (isset($employment)) {
      $join_group = array();
      foreach ($employment as $value) {
          if ($value->group) {
            array_push($join_group,$value->group);
          }
      }
      //viewに値を
      View::share('join_group', $join_group);
    }
  }
}
