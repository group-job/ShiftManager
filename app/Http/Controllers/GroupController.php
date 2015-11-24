<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Group;
use App\Employment;
use App\User;
use App\Chat;
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
       $GroupApply= new GroupApply();
       $group = $GroupApply->getGroupInfo($id);
       $checkapply = $GroupApply->checkApply($id);
       return view('groupsettings.groupapply.apply',compact('id','group','checkapply'));
     }
     
    /**
     * メンバー申請処理用
     *
     * @return View
     */
     public function getApplyed($id='default'){
       // $this->loadModel('GroupApply',compact('id'));
       $GroupApply= new GroupApply();
    //   $GroupApply->userApply($id);
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

    public function getChat()
    {
      $chat = Chat::where('group_id','=','2')->get();
      $chatLog = array();
      foreach ($chat as $value) {
        $chatParams  = array(
          'text' => $value->text,
          'name' => $value->user->name,
        );
        array_push($chatLog, $chatParams);
      }
      // dd($chatLog);
      return $chatLog;
    }
}
