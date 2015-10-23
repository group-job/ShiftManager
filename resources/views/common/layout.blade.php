<!DOCTYPE HTML>
<html lang="ja">
{{-- //ヘッダー --}}
@include('common.header')

{{-- ナビゲーションメニュー --}}
@include('common.navi-menu')

{{-- サイドメニュー --}}
<div class="col-md-2">
@include('common.side-menu')
</div>

{{-- メインコンテツ --}}
<div class="col-md-10">
@yield('content')
</div>

{{-- フッター --}}
@include('common.footer')

</html>
