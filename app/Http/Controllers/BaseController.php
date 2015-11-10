<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employment;
use App\Group;
use View;

class BaseController extends Controller
{
//   public function __construct()
//   {
//     // $my_profile = User::myProfile()->find(1);
//     $join_group_id = Employment::joinGroup()->get();
//
//     if ($join_group_id) {
//       $join_group = Group::group($join_group_id)->get();
//       View::share('join_group', $join_group);
//     }
//
//     // View::share('member_group', $member_group_id);
//     View::share('join_group_id', $join_group_id);
//
//   }
}
