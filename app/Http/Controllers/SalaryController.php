<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shift;
use App\Group;
use App\Employment;
use Auth;
use Input;


class SalaryController extends BaseController
{

  public function getList()
  {
    $salary_arry=$this->getRate();
    //$this->getShiftTime();
    $this->getshort($salary_arry);
    return view('salary.list',compact('salary_arry'));
  }

  public function getManager()
  {
    $salary_arry=$this->getRate();
    return view('salary.manager',compact('salary_arry'));
  }

  public function getShow(){

    $field1 = '';
    $field2 = '';
    return view('salary.home',compact('field1,field2'));
  }
  
  private function getRate(){//現在所属、または今月まで所属していたグループの給与設定を取得するメソッドS
    $groupids;
    $salary_arry;
    $bool_array;
    $groupids = $this->getGroup();
    $cnt=0;
    foreach($groupids as $value){
        foreach(Auth::user()->rates as $value1){
          if($value1->group_id==$value && ( strcmp($value1->end_date,'0000-00-00') || ($value1->end_date < date("Y-m", strtotime("+1 month")))))
          {
            $salary_arry[$value][0]=$value1->group->group_name;
            $salary_arry[$value][1]=$value1->group_id;
            $salary_arry[$value][]=$value1->rate_category;
            $salary_arry[$value][]=$value1->rate;
            switch($value1->rate_category){
             case(0):
               $salary_arry[$value][]="時給";
               break;
             case(1):
               $salary_arry[$value][]="日給";
               break;
             case(2):
               $salary_arry[$value][]="月給";
               break;
            }
            $salary_arry[$value][]=$value1->start_date;
            switch(strcmp($value1->end_date,'0000-00-00')){
             case(false):
               $salary_arry[$value][]="未入力";
               break;
             case(true):
               $salary_arry[$value][]=$value1->end_date;
               break;
            }
              $cnt+=1;
          }
        }
    }
    return $salary_arry;
  }
  
  private function getShiftTime(){//編集中 シフトの時間を取得する
    $result_array;
    foreach(Auth::user()->shifts as $value)
    {
      $result_array[]=$value->group_id;
      $result_array[]=$value->date;
      $result_array[]=$value->start_time;
      $result_time=(strtotime($value->end_time) - strtotime($value->start_time))/(60*60);
      $result_array[]=floor($result_time);
      $result_array[]=$value->status;
    }
    $salary_arry=$this->getSalary();
    dd($result_array);
    return $result_array; 
  }
  
  private function getSalary(){//編集中　シフトの金額を計算する。
    $result_array;
    $rate=$this->getRate();
    foreach($rate as $value)
    {
      dd($value);
    }
    
    return $result_array;
  }
  
  private function getshort($rate){//編集中　getRateで取得した表を短縮する
    $result_array;
    foreach($rate as $value)
    {
      for($i=3;$i<count($result);$i=$i+5)
      {
        $result_array[0]=$value[1];
        $result_array[1]=$value[2];
        $result_array[]=$value[$i+3];
        $result_array[]=$value[$i+5];
      }
    }
    return $result_array;
  }
  
  private function getGroup(){//現在所属してるグループのIDを取得するメソッド
  $result_array;
   foreach(Auth::user()->employments as $value)
  {
    $cheaktime=strcmp($value->end_date,'0000-00-00');
    if(!$cheaktime){
      $result_array[]=$value->group_id;
    }
  }
  return $result_array; 
  }
}
