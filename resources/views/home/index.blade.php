<?php
$login_message = "ログイン失敗した場合はここにメッセージ";
?>

@extends('common.layout')

{{-- サイドメニューを消す --}}
@section('side-menu')
@stop

@section('contents')
  <div class="home">
    {{-- ログインボタンを押した時に表示するモーダル --}}
    @include('home.part-login-modal')


  </div>
@stop
