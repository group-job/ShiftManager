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
    // $groupids;
    // foreach(Auth::user()->rates as $value){
    //   $cheaktime=strcmp($value->end_date,'0000-00-00');
    //   if(!$cheaktime){
    //     $groupids[]=$value;
    //   }
    // }
    
    $groupids;
    foreach(Auth::user()->employments as $value){
      if(!$cheaktime){
        $groupids[]=$value;
      }
    }
    dd($groupids);
    $groupids[]=$value->id;
        $groupids[]=$value->user_id;
        $groupids[]=$value->group_id;
        $groupids[]=$value->start_date;
        $groupids[]=$cheaktime;
    
    
    $saarly_arry;
    foreach(Auth::user()->rates as $value){
    $saarly_arry[]=$value->rate;
    $saarly_arry[]=$value->user_id;
    }
    //echo ($saarly_arry);
    return view('salary.list');
  }

  public function getManager()
  {
    return view('salary.manager');
  }

  public function getShow(){

    $field1 = '';
    $field2 = '';
    return view('salary.home',compact('field1,field2'));
  }
  
  public function Show(){
    return 0;
  }
  
  public function itex(){
  $mymonney = Auth::user()->shifts;
   
  return view('salary.manager'); 
  }
}
