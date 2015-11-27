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
use DateTime;
use Input;

class GroupController extends BaseController
{
  private $compact;

  public function params($groupId)
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
     public function getApproval($id='default'){
       if(!empty($_SESSION['employments_id'])){
           unset($_SESSION['employments_id']);
           $_SESSION["employments_id"] = array();
           session_destroy();
       }
       $employments = Employment::join('users','employments.user_id','=','users.id')
                ->where('employments.group_id','=',$id)
                ->where('start_date','=','0000-00-00')
                ->select('employments.id','users.name')
                ->get();
       return view('groupsettings.groupapproval.approval',$this->compact,compact('employments'));
     }

    /**
     * メンバー申請用の画面表示
     *
     * @return Response
     */
     public function getApply($id='default'){
       $checkgroup = $this->checkGroup($id);
       $group = $this->getGroupInfo($id);
       $checkapply = $this->checkApply($id);
       $checkregistration = $this->checkRegistration($id);
       return view('groupsettings.groupapply.apply',compact('checkgroup','group','checkapply','checkregistration'));
     }

    /**
     * メンバー申請処理用
     *
     * @return View
     */
     public function getApplyed($groupId='default'){
       $this->params($groupId);
       // $this->loadModel('GroupApply',compact('id'));
    //   $GroupApply->userApply($id);
       $this->userApply($groupId);
       return view('group.home',$this->compact,compact('groupId'));
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

    //承認処理
    public function getApprovaltrue($id='default')
    {
        session_start();
        if(!empty($_SESSION["employments_id"])){
            $today = new DateTime();
            $count = (int)$_GET["count"];
            Employment::where('id','=',$_SESSION["employments_id"][$count])
                    ->where('group_id','=',$id)
                    ->update(['start_date'=> $today->format('Y-m-d')]);
        }
        return $this->getApproval($id);
    }

    //拒否処理
    public function getApprovalfalse($id='default')
    {
        session_start();
        if(!empty($_SESSION["employments_id"])){
            $count = $_GET['count'];
            Employment::where('id','=',$_SESSION["employments_id"][$count])
                    ->where('group_id','=',$id)
                    ->delete();
            return $this->getApproval($id);
        }
    }

        //申請追加データベース処理
    public function userApply($id){
        Employment::create([
            'user_id' => Auth::user()->id,
            'group_id' => $id,
            'start_date' => '0000-00-00'
        ]);
    }

    //グループ情報取得データベース処理
    public function getGroupInfo($id){
       $group = Group::join('users','groups.manager_id','=','users.id')
                ->where('groups.id','=',$id)
                ->select('groups.id','groups.group_name','users.name')
                ->first();
       return $group;
    }

    //既に申請済みか確認(false=未申請 true=申請済み)
    public function checkApply($id){
        //同一ユーザが同一グループに申請済みか取得レコード数で確認
        $user = Employment::where('user_id','=',Auth::user()->id)
                            ->where('group_id','=',$id)
                            ->where('start_date','=','0000-00-00')
                            ->where('end_date','=','0000-00-00')
                            ->count();
        if($user == 0){
            return false;
        }else{
            return true;
        }
    }

    //既に登録済みか確認(false=未登録 true=登録済み)
    public function checkRegistration($id){
        //同一ユーザが同一グループに申請済みか取得レコード数で確認
        $user = Employment::where('user_id','=',Auth::user()->id)
                            ->where('group_id','=',$id)
                            ->where('start_date','<>','0000-00-00')
                            ->where('end_date','=','0000-00-00')
                            ->count();
        if($user == 0){
            return false;
        }else{
            return true;
        }
    }

    //グループが存在するか確認(false=存在しない true=存在する)
    public function checkGroup($id){
        //同一ユーザが同一グループに申請済みか取得レコード数で確認
        $group = Group::where('id','=',$id)
                        ->count();
        if($group == 0){
            return false;
        }else{
            return true;
        }
    }
}
