<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Group;
use App\Employment;
use App\Http\Requests\GroupRequest;
use Auth;

class GroupController extends BaseController
{

    /**
     * グループ作成用の画面表示
     *
     * @return View
     */
     public function getHome($name='default'){
      //  dd($name);
      //
       return view('group.home');
     }

    public function getCreate()
    {
        return view('groupcreate.create');
    }

    /**
     * 作成ボタンをおした時の処理
     * @param  GroupRequest
     * @return View
     */
    public function postCreate(GroupRequest $request)
    {
      //ユーザidの追加
      $request["user_id"] = Auth::user()->name;
      //グループ登録
      Group::create($request->all());
      //雇用登録
      Employment::create();
      // フラシュメッセージの表示
      \Session::flash('flash_message', 'グループの作成に成功しました。');
      // 直前にリダイレクト
      return redirect()->back();
    }
    //グループ設定
    public function postStore(GroupRequest $request)
    {
      $group = Group::group($join_group_id)->get();
      $group->update($request->all());
    }
}
