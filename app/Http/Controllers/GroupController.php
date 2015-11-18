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
use App\GroupApply;

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
     * メンバー招待用の画面表示
     *
     * @return View
     */
     public function getInvite($id='default'){
       return view('groupsettings.groupinvite.invite',compact('id'));
     }

    /**
     * メンバー承認用の画面表示
     *
     * @return View
     */
     public function getApproval($id='default'){
       return view('groupsettings.groupapproval.approval',compact('id'));
     }

    /**
     * メンバー申請用の画面表示
     *
     * @return View
     */
     public function getApply($id='default'){
       return view('groupsettings.groupapply.apply',compact('id'));
     }
    /**
     * メンバー申請処理用
     *
     * @return View
     */
     public function getApplyed($id='default'){
       // $this->loadModel('GroupApply',compact('id'));
       $GroupApply= new GroupApply();
       $GroupApply->userApply($id);
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
