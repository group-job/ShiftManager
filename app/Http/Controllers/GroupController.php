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
use Session;

class GroupController extends BaseController
{
  private $compact;

  /**
   * グループIDとグループ名をViewへ渡す
   * @param  [type] $groupId [description]
   * @return [type]          [description]
   */
  public function params($groupId)
  {
    $group = Group::find($groupId);
    if (isset($group)) {
      foreach ($group as $value) {
        $groupName = $group->group_name;
      }
    }else{
      // Session::put('errorMessage', '指定されたグループは存在しません') ;
      $view = redirect('/personal/home');
      return $view;
      }
    $this->compact = compact('groupId','groupName');
    }
<<<<<<< HEAD
  }
  public function commonParams($groupId)
  {
    $group = Group::find($groupId);
    if (isset($group)) {
      $groupName = $group->group_name;
      return compact('groupId','groupName');
    }
  }
=======
>>>>>>> 04f27068a1c6efa93385d4bf701bcb118011b93d

    /**
     * グループ作成用の画面表示
     * @param  [type] $groupId [description]
     * @return [type]          [description]
     */
<<<<<<< HEAD
     public function getShift($groupId){
       $commonParams = $this->commonParams($groupId);
       if (Auth::user()->id === Group::find($groupId)->manager_id) {
         # code...
       }
       return view('group.join-shift',$commonParams,compact('group'));
=======
    public function getShift($groupId){
       $flg = $this->params($groupId);
       if (isset($flg)){
         return $flg;
       }
       return view('group.join-shift',$this->compact);
>>>>>>> 04f27068a1c6efa93385d4bf701bcb118011b93d
     }

     /**
      * 連絡ボードの表示
      * @param  string $groupId [description]
      * @return [type]          [description]
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
       if(!empty($_SESSION['employments_id'])){
           unset($_SESSION['employments_id']);
           $_SESSION["employments_id"] = array();
           session_destroy();
       }
       $employments = Employment::join('users','employments.user_id','=','users.id')
                ->where('employments.group_id','=',$groupId)
                ->where('start_date','=','0000-00-00')
                ->select('employments.id','users.name')
                ->get();
       return view('groupsettings.groupapproval.approval',$this->compact,compact('employments'));
     }

     public function postApprove($groupId='default'){
         $this->params($groupId);
         $forms = Input::all();
         $approve_flg = false;
         if(Input::get('approve') == "承認する"){
             $approve_flg = true;
         }else if(Input::get('approve') == "拒否する"){
             $approve_flg = false;
         }
         if($approve_flg){
             //承認処理
            $today = new DateTime();
            Employment::where('id','=',Input::get('employment_id'))
                    ->where('group_id','=',$groupId)
                    ->update(['start_date'=> $today->format('Y-m-d')]);
         }else{
             //拒否処理
            Employment::where('id','=',Input::get('employment_id'))
                    ->where('group_id','=',$groupId)
                    ->delete();
         }
         return redirect('/group/'.$groupId.'/approval');
     }

    /**
     * メンバー申請用の画面表示
     *
     * @return Response
     */
     public function getApply($groupId='default'){
       $checkgroup = $this->checkGroup($groupId);
       $group = $this->getGroupInfo($groupId);
       $checkapply = $this->checkApply($groupId);
       $checkregistration = $this->checkRegistration($groupId);
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
       $checkgroup = $this->checkGroup($groupId);
       $checkapply = $this->checkApply($groupId);
       $checkregistration = $this->checkRegistration($groupId);
       if($checkgroup && !$checkapply && !$checkregistration){
        $this->userApply($groupId);
       }
       return redirect('/personal/home');
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
    /**
     * チャット,連絡ボード取得
     * @param  Request $request [description]
     * @return Array $chatLog         [description]
     */
    public function postShowChat(Request $request)
    {
      $limit = 10;
          $count = Chat::log($request)->count();
          if ($count >= $limit) {
              $chat = Chat::log($request)->skip($count-$limit)->take($limit)->get();
          }
          if ($count <= $limit) {
              $chat = Chat::log($request)->get();
          }
      $chatLog = array();
      foreach ($chat as $value) {
        $chatParams  = array(
          'text' => $value->text,
          'name' => $value->user->name,
          'date' => substr($value->date, 0, 10),
          'time' => substr($value->date, 11, 5),
        );
        array_push($chatLog, $chatParams);
      }
      return $chatLog;
    }

    /**
     * チャット登録
     * @param  ChatRequest $request [description]
     */
    public function postStoreChat(ChatRequest $request)
    {
      $date = new \DateTime();
      if(isset($request->text))
      {
        $this->createChat($request, $date);
      }else{
      }
    }

    /**
     * 承認処理
     * @param  [type] $id            [description]
     * @param  [type] $employment_id [description]
     * @return [type]                [description]
     */

    // public function getApprovalTrue($groupId)
    // {
    //     session_start();
    //     if(!empty($_SESSION["employments_id"])){
    //         $today = new DateTime();
    //         $count = (int)$_GET["count"];
    //         Employment::where('id','=',$_SESSION["employments_id"][$count])
    //                 ->where('group_id','=',$groupId)
    //                 ->update(['start_date'=> $today->format('Y-m-d')]);
    //     }
    //     return $this->getApproval($groupId);
    // }

    /**
     * 拒否
     * @param  [type] $id            [description]
     * @param  [type] $employment_id [description]
     * @return [type]                [description]
     */
    // public function getApprovalFalse($groupId)
    // {
    //     session_start();
    //     if(!empty($_SESSION["employments_id"])){
    //         $count = $_GET['count'];
    //         Employment::where('id','=',$_SESSION["employments_id"][$count])
    //                 ->where('group_id','=',$groupId)
    //                 ->delete();
    //         return $this->getApproval($groupId);
    //     }
    // }

    /**
     * 申請追加データベース処理
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function userApply($groupId){
      // TODO: 重複チェック
        Employment::create([
            'user_id' => Auth::user()->id,
            'group_id' => $groupId,
            'start_date' => '0000-00-00'
        ]);
    }

    /**
     * グループ情報取得データベース処理
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getGroupInfo($groupId='default'){
       $group = Group::join('users','groups.manager_id','=','users.id')
                ->where('groups.id','=',$groupId)
                ->select('groups.id','groups.group_name','users.name')
                ->first();
       return $group;
    }

    /**
     * 既に申請済みか確認(false=未申請 true=申請済み)
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function checkApply($groupId='default'){
        //同一ユーザが同一グループに申請済みか取得レコード数で確認
        $user = Employment::where('user_id','=',Auth::user()->id)
                            ->where('group_id','=',$groupId)
                            ->where('start_date','=','0000-00-00')
                            ->where('end_date','=','0000-00-00')
                            ->count();
        if($user == 0){
            return false;
        }else{
            return true;
        }
    }

    /**
     * 既に登録済みか確認(false=未登録 true=登録済み)
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    //既に登録済みか確認(false=未登録 true=登録済み)
    public function checkRegistration($groupId='default'){
        //同一ユーザが同一グループに申請済みか取得レコード数で確認
        $user = Employment::where('user_id','=',Auth::user()->id)
                            ->where('group_id','=',$groupId)
                            ->where('start_date','<>','0000-00-00')
                            ->where('end_date','=','0000-00-00')
                            ->count();
        if($user == 0){
            return false;
        }else{
            return true;
        }
    }

    /**
     * グループが存在するか確認(false=存在しない true=存在する)
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function checkGroup($groupId='default'){
        //同一ユーザが同一グループに申請済みか取得レコード数で確認
        $group = Group::where('id','=',$groupId)
                        ->count();
        if($group == 0){
            return false;
        }else{
            return true;
        }
    }

    /**
     * db登録
     * @param  [type] $request  [description]
     * @param  [type] $date     [description]
     * @param  [type] $category [description]
     */
    public function createChat($request, $date)
    {
      $chat = Chat::create([
          'user_id' => Auth::user()->id,
          'group_id' => $request->id,
          'date' => $date,
          'text' => $request->text,
          'chat_category' => $request->category,
      ]);
    }
}
