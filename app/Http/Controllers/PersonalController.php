<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shift;
use App\Group;
use Auth;
use Input;


class PersonalController extends BaseController
{
  // ===============個人シフト画面へアクセスされたとき================================
  public function getHome(){
    //個人カレンダーの全シフトをJsonで取得
    //マイシフト取得
    $myShifts = Auth::user()->shifts;
    $calendarEvents = array();
    foreach ($myShifts as $value) {
      $myShiftFlg = ($value->group->manager_id === $value->user_id);
      $calendarEvents[] = array(
        //カレンダーイベントクリック時処理などに利用
        'shift_id' => $value->id,
        // 'manager_id' => $value->group->manager_id,
        // 'group_id' => $value->group_id,
        // 'user_id' => $value->user_id,
        'my_shift_flg' =>$myShiftFlg,
        'status' => $value->status,
        'date' => $value->date,
        'start_time' =>$value->start_time,
        'end_time' =>$value->end_time,

        //ここから下カレンダー描画に必要
        'className' => 'event-status'.$value->status,
        'title' => $value->group->group_name,
        'start' => $value->date.'T'.$value->start_time,
        'end' => $value->date.'T'.$value->end_time,
      );
    }
    $calendarEventsJson = json_encode($calendarEvents);
    //$calendarEventsJsonは personal.home内のpart-create-calendar.blade.phpに渡す
    return view('personal.home',compact('calendarEventsJson'));
  }

//==============================削除依頼=========================================
  public function postRequestDelete(){
    //ログイン中のユーザーの全シフトからフォーム入力で指定されたidのシフトインスタンスを取得
    $shift = Auth::user()->shifts->find(Input::get('shift-id'));
    if($shift !== null){
      $shift->status = 3;
      $shift->save();
    }else {
      echo "指定されたShiftはありません";
    }
  }
//==============================仮シフト承認/拒否=========================================
  public function postReply(){
    $shift = Auth::user()->shifts->find(Input::get('shift-id'));
    $replay = Input::get('shift-status');
    if($shift !== null){
      switch ($replay) {
        case '2':
          //仮シフトが承a認された
          $shift->status = 2;
          $shift->save();
          echo "承認";
          break;
        case '4':
          //仮シフトが拒否された
          $shift->delete();
          echo "拒否";
          break;
        default:
          //
          echo "エラー";
          break;
      }
    }else {
      echo "指定されたShiftはありません";
    }
  }

//==============================個人シフト追加====================================
  public function postAddShift(){
    // TODO: 作成途中
    //requestパラメータはShiftの全フィールド
    $shift = Input::except('_token');
    Shift::create($shift);
  }
//==============================個人シフト変更====================================
  public function postEditShift(){
    // TODO 作成途中
    //requestパラメータはShiftの全フィールド
    $shift = Shift::find($request->input('id'));
    $newShift = input::except('_token');
    $shift->fill($newShift);
    $shift->save();
}
//==============================個人シフト削除====================================
  public function postDeleteShift(){
    // TODO: 作成途中
    //ログイン中のユーザーの全シフトからフォーム入力で指定されたidのシフトインスタンスを取得
    $shift = Auth::user()->shifts->find(input::get('shift-id'));
    // 該当するシフトがある場合
    if($shift !== null){
      $shift->delete();
    }else {
      echo "指定されたShiftはありません";
    }
  }
  //==============================テスト=====================================
  public function getTest(){
      echo Input::get('id');
  }
  public function getUssiy(){
    return view('ussiy');
  }
  
}
