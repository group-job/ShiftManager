<?php
$login_message = "ログイン失敗した場合はここにメッセージ";
?>

@extends('common.layout')

@section('navbar-right')
  {{-- アクション:ログインモーダルの表示 --}}
  <button id="login-botton" class="btn btn-primary" data-toggle="modal" data-target="#login-modal" >
    ログイン
  </button>
@stop

{{-- サイドメニューを消す --}}
@section('side-menu')
@stop

@section('contents')
  <div class="home">
    {{-- ログインボタンを押した時に表示するモーダル --}}
    @include('home.part-login-modal')

    
  </div>
@stop
