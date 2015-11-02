<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group;

class GroupController extends Controller
{

    /**
     * グループ作成用の画面表示
     *
     * @return view
     */
    public function create()
    {
        $title = 'グループの作成';
        return view('create.group',compact('title'));
    }

    /**
     * 作成ボタンをおした時の処理
     *
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store()
    {
      $inputs = \Request::all();
      $inputs["manager_id"] = "10";
      // ②マスアサインメントを使って、DB
      Group::create($inputs);
      // die(var_dump($inputs));
      // フラシュメッセージの表示
      \Session::flash('flash_message', 'グループの作成に成功しました。');
      // ③記事一覧へリダイレクト

      $title = 'グループの作成';
      return redirect()->back();
    }

}
