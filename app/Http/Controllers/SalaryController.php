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
    $groupids;
    foreach(Auth::user()->employments as $value){
      $cheaktime=strcmp($value->end_date,'0000-00-00');
      if(!$cheaktime){
        $groupids[]=$value->group_id;
      }
    }
    dd($groupids);
    
    
    $saarly_arry;
    foreach(Auth::user()->rates as $value){
    $saarly_arry[]=$value->rate;
    $saarly_arry[]=$value->user_id;
    }
    //echo ($saarly_arry);
    return view('salary.list',compact('groupids'));
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
