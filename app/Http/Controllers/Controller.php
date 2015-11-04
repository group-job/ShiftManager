<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Group;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getSideMenu()
    {
      // var_dump(Group::all()->get(1)["group_name"]);
      $manage_group = Group::latest('created_at')->manager()->get();
      // die($manage_group);
      return $manage_group;
    }
}
