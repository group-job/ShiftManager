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
use App\Confirmation;
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
        // $groupName = $group->group_name;
    }else{
      // Session::put('errorMessage', '指定されたグループは存在しません') ;
      $view = redirect('/personal/home');
      return $view;
      }
      $groupName = "aaaaa";
      $groupId = 1;
    $this->compact = compact('group');
    }

  public function commonParams($groupId)
  {
    $group = Group::find($groupId);
    if (isset($group)){
      return compact('group');
    }else {
      Session::flash('errorMessage', '指定されたグループは存在しません') ;
      exit (redirect('/personal/home'));
    }
  }

    /**
     * グループ作成用の画面表示
     * @param  [type] $groupId [description]
     * @return [type]          [description]
     */
     public function getShift($groupId){
      //  dd(!$this->checkGroup($groupId));
       if (!$this->checkGroup($groupId)) {
         Session::flash('errorMessage', '指定されたグループは存在しません') ;
         return redirect('/personal/home');
       }else {
         $commonParams = $this->commonParams($groupId);
         $calendarEvents = array();
         $shifts = Group::find($groupId)->shifts;
         foreach ($shifts as $value) {
           $calendarEvents[] = array(
             //カレンダーイベントクリック時処理などに利用
             'id' => $value->id,
             'status' => $value->status,
            //  'date' => $value->date,
            //  'start_time' =>date('G:i', strtotime($value->start_time)),
            //  'end_time' =>date('G:i', strtotime($value->end_time)),
             'note' => $value->note,
             //ここから下カレンダー描画に必要
             'resourceId' =>$value->user_id,
             'className' => 'event-status'.$value->status,
             'title' => $value->group->group_name,
             'start' => $value->date.'T'.$value->start_time,
             'end' => $value->date.'T'.$value->end_time,
           );
         }
         $calendarEventsJson = json_encode($calendarEvents);
         if (Auth::user()->id === Group::find($groupId)->manager_id) {
           //管理グループ
           return view('group.manage-shift',$commonParams,compact('calendarEventsJson'));
         }else if(Employment::where('user_id',Auth::user()->id)->where('group_id', $groupId)->count() !== 0){
           //参加グループ
           $group = Group::find($groupId);
           return view('group.join-shift',$commonParams,compact('group'));
         }else{
           Session::flash('errorMessage', '指定されたグループへのアクセス権がありません') ;
           return redirect('/personal/home');
         }
       }
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
     /*
      *チャットの表示
      */
     public function getSetting($groupId='default')
     {
       if (!$this->checkGroup($groupId)) {

         Session::flash('errorMessage', '指定されたグループは存在しません') ;
         return redirect('/personal/home');
       }else{
         $commonParams = $this->commonParams($groupId);
         if (Auth::user()->id === Group::find($groupId)->manager_id) {
           //管理グループ
           $group = Group::find($groupId);
           echo "管理グループ";
           return view('group.settings',$commonParams,compact('calendarEventsJson','group'));
         }else{
           Session::flash('errorMessage', '指定されたグループへのアクセス権がありません') ;
           return redirect('/personal/home');
         }
       }
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
          'id'   => $value->id,
          'text' => $value->text,
          'name' => $value->user->name,
          'date' => substr($value->date, 0, 10),
          'time' => substr($value->date, 11, 5),
          'check' => $value->confirmations,
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

    public function postCheckInfomation(Request $request)
    {
      Confirmation::create([
          'chat_id' => $request->chatId,
          'user_id' => Auth::user()->id,
      ]);
    }

    /**
     * 承認処理
     * @param  [type] $id            [description]
     * @param  [type] $employment_id [description]
     * @return [type]                [description]
     */

    public function getApprovalTrue($groupId)
    {
        session_start();
        if(!empty($_SESSION["employments_id"])){
            $today = new DateTime();
            $count = (int)$_GET["count"];
            Employment::where('id','=',$_SESSION["employments_id"][$count])
                    ->where('group_id','=',$groupId)
                    ->update(['start_date'=> $today->format('Y-m-d')]);
        }
        return $this->getApproval($groupId);
    }

    /**
     * 拒否
     * @param  [type] $id            [description]
     * @param  [type] $employment_id [description]
     * @return [type]                [description]
     */
    public function getApprovalFalse($groupId)
    {
        session_start();
        if(!empty($_SESSION["employments_id"])){
            $count = $_GET['count'];
            Employment::where('id','=',$_SESSION["employments_id"][$count])
                    ->where('group_id','=',$groupId)
                    ->delete();
            return $this->getApproval($groupId);
        }
    }

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
    public function checkGroup($groupId){
        if(Group::find($groupId) !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     *  チャットdb登録
     * @param  [type] $request  [description]
     * @param  [type] $date     [description]
     * @param  [type] $category [description]
     */
    public function createChat($request, $date)
    {
      Chat::create([
          'user_id' => Auth::user()->id,
          'group_id' => $request->id,
          'date' => $date,
          'text' => $request->text,
          'chat_category' => $request->category,
      ]);
    }
}
