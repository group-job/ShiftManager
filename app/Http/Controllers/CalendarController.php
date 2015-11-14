<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shift;
use App\Group;
use Auth;
use Input;

class CalendarController extends BaseController
{
    public static function createPersonalCalendarJson(){
      //マイシフト取得
      $myShifts = Auth::user()->shifts;
      $calendarEvents;
      foreach ($myShifts as $value) {

        $calendarEvents[] = array(
          'title' => $value->group->group_name,
          'start' => $value->date.'T'.$value->start_time,
          'end' => $value->date.'T'.$value->end_time,
        );
      }
      return json_encode($calendarEvents);

    }

    public function postEditShift(){
      // TODO 作成途中
      //requestパラメータはShiftの全フィールド
      $shift = Shift::find($request->input('id'));
      $newShift = input::except('_token');
      $shift->fill($newShift);
      $shift->save();

    }
    public function postAddShift(){
      // TODO: 作成途中
      //requestパラメータはShiftの全フィールド
      $shift = Input::except('_token');
      Shift::create($shift);
    }

    public function postDeleteShift(){
      // TODO: 作成途中
      // 削除指定のシフトがログイン中のゆーざーのものかチェック
      $shift = Shift::find($request->input('id'));
      if($shift !== null && $shift->user_id === Auth::user()->id){
      $shift->delete();
      }else {
        echo "指定されたShiftはありません";
      }
    }
    public function getTest(){
        var_dump(Input::except('_token'));
    }
}
