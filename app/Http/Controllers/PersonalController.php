<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CalendarController;
use App\Shift;
use App\Group;
use Auth;
use Input;

class PersonalController extends BaseController
{
  // 個人シフト画面へアクセスされたときーーーーーーーーーーーーーーーーーーーーーーーーーーー
  public function getHome(){
    //個人カレンダーの全シフトをJsonで取得
    $calendarEventsJson = CalendarController::createPersonalCalendarJson();
    //$calendarEventsJsonは personal.home内のpart-create-calendar.blade.phpに渡す
    return view('personal.home',compact('calendarEventsJson'));
  }
}
