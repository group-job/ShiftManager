<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shift;
use App\Group;
use Auth;
use Input;


class SalaryController extends BaseController
{

  public function getList()
  {
    $saarly_arry;
    foreach(Auth::user()->rates as $value){
    $saarly_arry[]=$value->rate;
    }
    dd($saarly_arry);
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
