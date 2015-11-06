<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Group;
use App\Http\Requests\GroupRequest;

class GroupController extends BaseController
{

    /**
     * グループ作成用の画面表示
     *
     * @return View
     */
     public function getHome(){
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
      $request["user_id"] = "22";
      //dbに登録
      Group::create($request->all());

      // フラシュメッセージの表示
      \Session::flash('flash_message', 'グループの作成に成功しました。');
      // 直前にリダイレクト
      return redirect()->back();
    }

}
