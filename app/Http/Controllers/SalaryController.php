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
            $salary_arry[$cnt][0]=$value1->group->group_name;
            $salary_arry[$cnt][]=$value1->rate;
            switch($value1->rate_category){
             case(0):
               $salary_arry[$cnt][]="時給";
               break;
             case(1):
               $salary_arry[$cnt][]="日給";
               break;
             case(2):
               $salary_arry[$cnt][]="月給";
               break;
            }
            $salary_arry[$cnt][]=$value1->start_date;
            switch(strcmp($value1->end_date,'0000-00-00')){
             case(false):
               $salary_arry[$cnt][]="未入力";
               break;
             case(true):
               $salary_arry[$cnt][]=$value1->end_date;
               break;
            }
              $cnt+=1;
          }
        }
        //$cnt+=1;
    }
    //dd($salary_arry);
    return $salary_arry;
  }
  
  private function getShiftTime(){//編集中
    $result_array;
    foreach(Auth::user()->shifts as $value)
    {
      
    }
    return $result_array; 
  }
  
  private function getSalary(){//編集中
    $result_array;
    $rate=$this->getRate();
    dd($rate[3]);
    
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
