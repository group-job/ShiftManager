<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DateTime;

class GroupApply extends Model
{
    //申請追加処理
    public function getEmployments($group_id){
        $employments = Employment::join('users','employments.user_id','=','users.id')
                ->where('employments.group_id','=',$group_id)
                ->select('employments.id','users.name')
                ->lists();
        return $employments;
    }
    
    //承認処理
    public function approvalEmployment($id,$group_id)
    {
        $today = new DateTime();
        Employment::where('id','=',$id)
                ->where('group_id','=',$group_id)
                ->update(['start_date'=> $today->format('Y-m-d')]);
    }
    
    //拒否処理
    public function denialEmployment($id,$group_id)
    {
        Employment::where('id','=',$id)
                ->where('group_id','=',$group_id)
                ->delete();
    }
}