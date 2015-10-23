<<<<<<< HEAD
{{-- ヘッダー --}}
=======
<!DOCTYPE HTML>
<html lang="ja">
{{-- //ヘッダー --}}
>>>>>>> origin/master
@include('common.header')

{{-- ナビゲーションメニュー --}}
@include('common.navi-menu')

{{-- サイドメニュー --}}
<div class="col-md-2">
@include('common.side-menu')
</div>

{{-- メインコンテツ --}}
<<<<<<< HEAD
<div class="col-md-9">
=======
<div class="col-md-10">
>>>>>>> origin/master
@yield('content')
</div>

{{-- フッター --}}
@include('common.footer')

</html>
