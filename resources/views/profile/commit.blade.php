<!-- レイアウトの継承 -->
@extends('common.layout')

<!-- サイドメニューを消したい時にかく -->
@section('side_menu')
@overwrite
<!-- ここまで -->

<!-- この中身にかく -->
@section('main-contents')

<h1>アカウント情報変更</h1>
アカウント情報の変更が完了しました。<br>
<a href="/profile.view">プロフィール閲覧画面へ戻る</a>


@endsection
<!-- ここまで -->
