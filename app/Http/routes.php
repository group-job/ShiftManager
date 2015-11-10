<?php

// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//                                重要
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// MAMPの設定でドキュメントルートをShiftManager/publicに変更してください!
// 暗黙ルーティング使おうよ!? 参照: https://goo.gl/JPpiaSs
// 例:/profile/view にアクセスでProfileController@view にルーティング
// ----------------------------------------------------------------------------

// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//                            通常のルーティング
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// Index
  Route::get('/', 'IndexController@index');

//Authentication
  Route::controller('auth', 'Auth\AuthController');
  //ログインしてる間許す
  Route::group(['middleware' => 'auth'], function(){
    //personal
    Route::controller('personal', 'PersonalController');
    //group
    Route::controller('group/{name?}', 'GroupController');
    //profile
    Route::controller('profile', 'ProfileController');
});




// // プロフィール
// Route::get('/profile/show', 'ProfileController@show');
// Route::get('/profile/edit', 'ProfileController@edit');
// Route::post('/profile/store', 'ProfileController@store');
// Route::resource('profile','ProfileController',['only' => ['show']]);
// Route::resource('profile','ProfileController');



//------------------------------------------------------------------------------
//                             開発用
//------------------------------------------------------------------------------
// /test数字 にアクセスでコントローラー経由せず test数字.blade.php を表示するよ
Route::get('/{view}', function($view)
{
  return view($view);
});
