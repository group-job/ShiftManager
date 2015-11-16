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
  // 個人シフト画面へアクセスされたときーーーーーーーーーーーーーーーーーーーーーーーーーーー
  public function getHome(){
    //個人カレンダーの全シフトをJsonで取得
    //マイシフト取得
    $myShifts = Auth::user()->shifts;
    $calendarEvents;
    foreach ($myShifts as $value) {
      $calendarEvents[] = array(
        //カレンダーイベントクリック時処理などに利用
        'shift_id' => $value->id,
        'group_id' => $value->group_id,
        'user_id' => $value->user_id,
        'status' => $value->status,
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

  public function postRequestDelete(){
    //ログイン中のユーザーの全シフトからフォーム入力で指定されたidのシフトインスタンスを取得
    $shift = Auth::user()->shifts->find(input::get('id'));
    if($shift !== null){
      $shift->status = 3;
      $shift->save();
    }else {
      echo "指定されたShiftはありません";
    }
  }

  public function postAddShift(){
    // TODO: 作成途中
    //requestパラメータはShiftの全フィールド
    $shift = Input::except('_token');
    Shift::create($shift);
  }

  public function postEditShift(){
    // TODO 作成途中
    //requestパラメータはShiftの全フィールド
    $shift = Shift::find($request->input('id'));
    $newShift = input::except('_token');
    $shift->fill($newShift);
    $shift->save();
}

  public function postDeleteShift(){
    // TODO: 作成途中
    //ログイン中のユーザーの全シフトからフォーム入力で指定されたidのシフトインスタンスを取得
    $shift = Auth::user()->shifts->find(input::get('id'));
    // 該当するシフトがある場合
    if($shift !== null){
      $shift->delete();
    }else {
      echo "指定されたShiftはありません";
    }
  }
  public function getTest(){
      echo Input::get('id');
  }
}
