@section('navi_menu')
<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid top-menu">
     {{-- スマートフォンサイズで表示されるメニューボタンとテキスト --}}
    <div class="navbar-header">

      {{-- タイトルなどのテキスト --}}
      <a class="navbar-brand" href="/">ロゴ</a>
    </div>
    <div class="navbar-right">
      @section('navbar-right')
        <img src="img/icon-cat.png" alt="" width="45" height="45"/>
         {{-- {{ Auth::user()->name }}さん --}}
      @show
    </div>

  </div>
</nav>
@show
