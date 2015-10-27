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
  @include('common.main-contents')
  </div>
  {{-- End of メインコンテンツ --}}

@show
{{-- END of コンテンツ --}}

{{-- フッター --}}
@include('common.footer')

</html>
