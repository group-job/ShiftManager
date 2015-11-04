<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group;
use App\Http\Requests\GroupRequest;

class GroupController extends Controller
{

    /**
     * グループ作成用の画面表示
     *
     * @return View
     */
    public function create()
    {
        $title = 'グループの作成';
        // var_dump(parent::getSideMenu());
        \Session::put('manager_id', '11');
        return view('groupcreate.create',compact('title'));
    }

    /**
     * 作成ボタンをおした時の処理
     * @param  GroupRequest
     * @return View
     */
    public function store(GroupRequest $request)
    {
      //ユーザidの追加
      $request["manager_id"] = "22";
      //dbに登録
      Group::create($request->all());

      // フラシュメッセージの表示
      \Session::flash('flash_message', 'グループの作成に成功しました。');
      // 直前にリダイレクト
      return redirect()->back();
    }

}
