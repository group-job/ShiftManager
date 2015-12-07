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
    if('2014-12-16'<  date("Y-m-j"))
    {
      $ifn="ガンダム";
    }
    
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
  
  private function getRate(){
    $groupids;
    $salary_arry;
    foreach(Auth::user()->employments as $value){
      $cheaktime=strcmp($value->end_date,'0000-00-00');
      if(!$cheaktime){
        $groupids=$value->group_id;
        foreach(Auth::user()->rates as $value1){
          $cheakgroup=strcmp($value1->group_id,$groupids);
          if(!$cheakgroup){
            $salary_arry[]=$value1->group_id;
            $salary_arry[]=$value1->rate;
            switch($value1->rate_category){
             case(0):
               $salary_arry[]="時給";
               break;
             case(1):
               $salary_arry[]="日給";
               break;
            }
            $salary_arry[]=$value1->start_date;
            $salary_arry[]=$value1->end_date;
          }
        }
      }
    }
    return $salary_arry;
  }
  
  public function itex(){
  $mymonney = Auth::user()->shifts;
   
  return view('salary.manager'); 
  }
}
