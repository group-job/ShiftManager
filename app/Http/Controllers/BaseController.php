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
    $member_group_id = GroupMember::memberGroup()->get();;
    $member_group = Group::groupName($member_group_id)->get();
    // View::share('member_group', $member_group_id);
    View::share('member_group', $member_group);
  }
}
