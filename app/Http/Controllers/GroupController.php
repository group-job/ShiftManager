<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Group;
use App\Employment;
use App\User;
use App\Http\Requests\GroupRequest;
use Auth;

class GroupController extends BaseController
{

    /**
     * グループ作成用の画面表示
     *
     * @return View
     */
     public function getHome($id='default'){
       return view('group.home');
     }

    /**
    * グループ設定
    * @param  GroupRequest $request [description]
    * @return [type]                [description]
    */
    public function postStore(GroupRequest $request)
    {
    $group = Group::group($join_group_id)->get();
    $group->update($request->all());
    }
}
