<?php
$login_message = "ログイン失敗した場合はここにメッセージ";
?>

@extends('common.layout')
@section('navbar-right')
  {{-- アクション:ログインモーダルの表示 --}}
  <button id="login-botton" class="btn btn-primary" data-toggle="modal" data-target="#login-modal" >
    ログイン
  </button>
  <button id="login-botton" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal" >
    新規登録
  </button>
@stop

{{-- サイドメニューを消す --}}
@section('side-menu')
@stop

@section('contents')
<div class="home">

</div>
@include('common.part-login-modal')
@stop
