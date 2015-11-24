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
    
    //グループ情報取得
    public function getGroupInfo($id){
       $group = Group::join('users','groups.manager_id','=','users.id')
                ->where('groups.id','=',$id)
                ->select('groups.group_name','users.name')
                ->first();
       return $group;
    }
    
    //既に申請済みか確認
    public function checkApply($id){
        //同一ユーザが同一グループに申請済みか取得レコード数で確認
        $user = Employment::where('user_id','=',Auth::user()->id)
                            ->where('group_id','=',$id)
                            ->where('end_date','=','0000-00-00')
                            ->count();
        return $user;
    }
}