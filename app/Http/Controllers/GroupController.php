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
use App\Http\Requests\ChatRequest;
use Auth;
use App\GroupApply;

class GroupController extends BaseController
{
  private $compact;

  public function params($groupId='default')
  {
    $group = Group::where('id','=',$groupId)->get();
    if (isset($group)) {
      foreach ($group as $value) {
        $groupName = $value->group_name;
      }
    }
    $this->compact = compact('groupId','groupName');
  }

    /**
     * グループ作成用の画面表示
     *
     * @return Response
     */
     public function getShift($groupId='default'){
       $this->params($groupId);
       return view('group.join-shift',$this->compact);
     }

     /*
      *	連絡ボードの表示
      *
      * @return Reponse
      */
     public function getInfomation($groupId='default')
     {
       $this->params($groupId);
       return view('group.infomation',$this->compact);
     }

     /*
      *チャットの表示
      */
     public function getChat($groupId='default')
     {
       $this->params($groupId);
       return view('group.chat',$this->compact);
     }

    /**
     * メンバー招待用の画面表示
     *
     * @return Response
     */
     public function getInvite($groupId='default'){
       $this->params($groupId);
       return view('groupsettings.groupinvite.invite',$this->compact);
     }

    /**
     * メンバー承認用の画面表示
     *
     * @return Response
     */
     public function getApproval($groupId='default'){
       $this->params($groupId);
       return view('groupsettings.groupapproval.approval',$this->compact);
     }

    /**
     * メンバー申請用の画面表示
     *
     * @return Response
     */
     public function getApply($groupId='default'){
       $this->params($groupId);
       $GroupApply= new GroupApply();
       $group = $GroupApply->getGroupInfo($groupId);
       $checkapply = $GroupApply->checkApply($groupId);
       return view('groupsettings.groupapply.apply',$this->compact,'group','checkapply');
     }

    /**
     * メンバー申請処理用
     *
     * @return View
     */
     public function getApplyed($groupId='default'){
       $this->params($groupId);
       // $this->loadModel('GroupApply',$this->compact'id'));
       $GroupApply= new GroupApply();
    //   $GroupApply->userApply($groupId);
       $GroupApply->userApply($groupId);
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

    public function postShowChat(Request $request)
    {
      $limit = 10;
      $count = Chat::where('group_id','=',$request->id)->count();
      if ($count >= $limit) {
          $chat = Chat::where('group_id','=',$request->id)->skip($count-$limit)->take($limit)->get();
      }
      if ($count <= $limit) {
          $chat = Chat::where('group_id','=',$request->id)->get();
      }
      $chatLog = array();
      foreach ($chat as $value) {
        $chatParams  = array(
          'text' => $value->text,
          'name' => $value->user->name,
          'date' => $value->date,
        );
        array_push($chatLog, $chatParams);
      }
      return $chatLog;
    }

    public function postStoreChat(ChatRequest $request)
    {
      $now = new \DateTime();
      if(isset($request->text))
      {
        $chat = Chat::create([
            'user_id' => Auth::user()->id,
            'group_id' => $request->id,
            'date' => $now,
            'text' => $request->text,
            'chat_category' => 0,
        ]);
      }else{
        // \Session::flash('flash_message', "入力してくださ");
        die("a");
      }
    }
}
