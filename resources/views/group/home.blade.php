<?php
const HOME_OWNER = "シフト表";
const HOME_OWNER_URL = "shift-home";
const INFOMATION = "連絡ボード";
const INFOMATION_URL = "infomation";
const CHAT = "チャット";
const CHAT_URL = "chat";
const NOTIFICATION = "お知らせ";
const NOTIFICATION_URL = "notification";
const SETTINGS = "設定";
const SETTINGS_URL = "settings";
const kind = "group";

$tabArray = array(HOME_OWNER => HOME_OWNER_URL,
                  INFOMATION => INFOMATION_URL,
                  CHAT => CHAT_URL,
                  NOTIFICATION => NOTIFICATION_URL,
                  SETTINGS => SETTINGS_URL);
 ?>
<!-- レイアウトの継承 -->
@extends('common.layout')

{{-- タイトル部分の表示 --}}
@section('title-space')
@include('group.title-name')
@endsection

@section('contents-space')
@include('common.tab-contents')
@endsection