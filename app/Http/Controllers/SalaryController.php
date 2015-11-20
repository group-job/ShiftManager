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
  public function getShow(){

    $field1 = '';
    $field2 = '';
    return view('salary.home',compact('field1,field2'));
  }
}
