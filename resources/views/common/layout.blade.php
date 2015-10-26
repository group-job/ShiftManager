<!DOCTYPE HTML>
<html lang="ja">

{{-- //ヘッダー --}}
@include('common.header')

{{-- ナビゲーションメニュー --}}
@include('common.navi-menu')

{{-- コンテンツ --}}
@section('contents')

  {{-- サイドメニュー --}}
  <div class="col-md-2">
  @include('common.side-menu')
  </div>

  {{-- メインコンテツ --}}
  <div class="col-md-10">
  @yield('main-contents')
  </div>

@show
{{-- END of コンテンツ --}}

{{-- フッター --}}
@include('common.footer')

</html>
