<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GroupMember;
use App\Group;
use View;

class BaseController extends Controller
{
  public function __construct()
  {
    // $my_profile = User::myProfile()->find(1);
    $join_group_id = GroupMember::joinGroup()->get();
    var_dump ($join_group_id);

    $join_group = Group::groupName($join_group_id)->get();
    // View::share('member_group', $member_group_id);
    View::share('join_group_id', $join_group_id);
    View::share('join_group', $join_group);
  }
}
