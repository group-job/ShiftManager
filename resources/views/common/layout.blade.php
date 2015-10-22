<!DOCTYPE HTML>
<html lang="ja">
{{-- //ヘッダー --}}
@include('common.header')

{{-- ナビゲーションメニュー --}}
@include('common.navi_menu')

{{-- サイドメニュー --}}
<div class="col-md-3">
@include('common.side_menu')
</div>

{{-- メインコンテツ --}}
<div class="col-md-9">
@yield('content')
</div>

{{-- フッター --}}
@include('common.footer')

</html>
