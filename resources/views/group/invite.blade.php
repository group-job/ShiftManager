{{-- 店名出すためだけのもの（仮） --}}
 {{-- <script type="text/javascript">
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
    </script> --}}
<!-- レイアウトの継承 -->
@extends('common.layout')

{{-- タイトル部分の表示 --}}
@section('title-space')
@include('group.title-name')
@endsection

@section('contents-space')
<div class="row">
  <h3>招待する</h3>
    URL:kimiyakimiya.jp
    <br>
    ※上記リンクを招待したい人にメール等で送ってください。
</div>
@endsection
