<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Group;
use View;

abstract class Controller extends RoutingController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
      //管理グループ取得
      $manager_group = '';
      View::share('manager_group',$manager_group);
      $join_group = '';
      View::share('join_group', $join_group);

    }
}
