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
{{-- 店名出すためだけのもの（仮） --}}
 <script type="text/javascript">
        window.onload = function onLoad() {
            param = GetQueryString();
            target = document.getElementById("param");
            target.innerHTML = param["name"];

        }

        function GetQueryString() {
            if (1 < document.location.search.length) {
                // 最初の1文字 (?記号) を除いた文字列を取得する
                var query = document.location.search.substring(1);

                // クエリの区切り記号 (&) で文字列を配列に分割する
                var parameters = query.split('&');

                var result = new Object();
                for (var i = 0; i < parameters.length; i++) {
                    // パラメータ名とパラメータ値に分割する
                    var element = parameters[i].split('=');

                    var paramName = decodeURIComponent(element[0]);
                    var paramValue = decodeURIComponent(element[1]);

                    // パラメータ名をキーとして連想配列に追加する
                    result[paramName] = decodeURIComponent(paramValue);
                }
                return result;
            }
            return null;
        }
    </script>
<!-- レイアウトの継承 -->
@extends('common.layout')

{{-- タイトル部分の表示 --}}
@section('title-space')
@include('group.title-name')
@endsection

@section('contents-space')
@include('common.tab-contents')
@endsection
