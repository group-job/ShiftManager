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


class GroupCreateController extends BaseController
{
  /**
   * [getCreate description]
   * @return [type] [description]
   */
  public function getEdit()
  {
      dd(Auth::user()->employments);
      return view('groupcreate.create');
  }

  /**
* 作成ボタンをおした時の処理
* @param  GroupRequest
* @return View
*/
public function postStore(GroupRequest $request)
{
  //ユーザidの追加
  $request["manager_id"] = Auth::user()->id;
  //グループ登録
  Group::create($request->all());
  // フラシュメッセージの設定
  \Session::flash('flash_message', 'グループの作成に成功しました。');
  // 直前にリダイレクト
  return redirect()->back();
  }
}
