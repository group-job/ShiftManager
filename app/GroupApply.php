<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class GroupApply extends Model
{
    //申請追加処理
    public function userApply($id){
        Employment::create([
            'user_id' => Auth::user()->id,
            'group_id' => $id,
            'start_date' => '0000-00-00'
        ]);
    }
}