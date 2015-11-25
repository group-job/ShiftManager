<!-- レイアウトの継承 -->
@extends('common.layout')

<!-- サイドメニューを消したい時にかく -->
@section('side_menu')
@overwrite
<!-- ここまで -->

<!-- この中身にかく -->
@section('main-contents')

<div>
    <ul>
    <li><a href="#smoothplay1">このサイトについて</a></li>
    <li><a href="#smoothplay2">使い方</a></li>
    <li>アカウント</li>
    <li>グループ作成</li>
    <li>グループ招待</li>
    <li>オーナー機能</li>
    <li>メンバー機能</li>
    <li>給与</li>
    <li>チャット</li>
    <li>連絡ボード</li>
    <li>お知らせ</li>
    </ul>
</div>

<div id="smoothplay1">
    このサイトは、アルバイトのシフト管理が簡単に行える素晴らしいサイトです。ぜひご利用ください。
</div>

<div id="smoothplay2">
    
</div>

@endsection
<!-- ここまで -->
