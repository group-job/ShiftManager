<?php

// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//                                重要
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// MAMPの設定でドキュメントルートをShiftManager/publicに変更してください!
// 通常のルーティングと重複すると2重にGET飛ばす可能性あり、要検証!!

// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//                                変更点
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// コントローラー名/メソッド名でルーティング!
// やっぱこれだね〜
// ろってのとっぽ!
// ごめんなさい(๑•̀ㅂ•́)و✧

// 例:/profile/view にアクセスでProfileController@view にルーティング

// 下に書いたもので上書きされるっぽいからとりあえず一番上に持ってきたよ


// // パラメーター取得（末尾の / は削除）
// 非推奨関数につきえらーでるからとりあえず無効化するよ
// ----------------------------------------------------------------------------
error_reporting(E_ERROR & ~E_NOTICE & ~E_PARSE);
$param = ereg_replace('/?$', '', $_SERVER['REQUEST_URI']);
$params[1] = '';
$params[2] = '';
$controller = 'index';
$action = 'index';
$params = array();
if ('' != $param) {
  // パラメーターを / で分割
  $params = explode('/', $param);
}
// １番目のパラメーターをコントローラーとして取得
if (1 < count($params)) {
  $controller = $params[1];
}
// 	// パラメータより取得したコントローラー名によりクラス振分け
$className = ucfirst(strtolower($controller)) . 'Controller';

// 2番目のパラメーターをメソッド名として取得
if (2 < count($params)) {
  $action = $params[2];
  if ($params[1] != 'test') {
    Route::get($params[1].'/'.$params[2], $className.'@'.$action);
  }

}



// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//                            通常のルーティング
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// こっちが優先される

//Authentication
Route::post('auth/register', 'Auth\AuthController@create');
Route::post('auth/login', 'Auth\AuthController@login');
Route::post('auth/login2', 'Auth\AuthController@postLogin');


// Index
Route::get('/', 'IndexController@index');

// // プロフィール
Route::get('profile/show', 'ProfileController@show');
Route::get('profile/edit', 'ProfileController@edit');
Route::post('profile/store', 'ProfileController@store');
// Route::resource('profile','ProfileController',['only' => ['show']]);
// Route::resource('profile','ProfileController');

//グループ作成
// Route::resource('group','GroupController',['only' => ['create', 'store']]);
Route::get('group/create', 'GroupController@show');
Route::post('group/store', 'GroupController@store');

//------------------------------------------------------------------------------
//                             開発用
//------------------------------------------------------------------------------
// /test数字 にアクセスでコントローラー経由せず test数字.blade.php を表示するよ
Route::get('/{view}', function($view)
{
  return view($view);
});
