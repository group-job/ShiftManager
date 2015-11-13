<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shift;
use App\Group;
use Auth;

class PersonalController extends Controller
{
    // ログイン画面へアクセスされたときーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function getHome(){
      //マイシフト取得
      $myShifts = Auth::user()->shifts;
      $calendarEvents;
      foreach ($myShifts as $value) {
        $calendarEvents[] = array(
          //ShiftクラスでgroupNameにグループ名を代入したいがわからないので暫定処理→グループidで検索してタイトルに直接入植してるよ
          'title' => Group::find($value->group_id)->group_name,
          'start' => $value->date.'T'.$value->start_time,
          'end' => $value->date.'T'.$value->end_time,
        );
      }
      $calendarEventsJson = json_encode($calendarEvents);
      return view('personal.home',compact('calendarEventsJson'));
    }
}
