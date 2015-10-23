<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function view()
    {
      return view('profile.view');
    }

    public function edit()
    {
      return view('profile.edit');

    }


}
