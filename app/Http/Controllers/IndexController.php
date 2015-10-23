<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
  // ログイン画面へ
    public function index()
    {
      return view('index');
    }


}
