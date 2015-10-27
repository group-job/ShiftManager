@section('navi_menu')
<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid top-menu">
     {{-- スマートフォンサイズで表示されるメニューボタンとテキスト --}}
    <div class="navbar-header">

      {{-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-menu-4">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>  --}}

      {{-- タイトルなどのテキスト --}}
      <a class="navbar-brand" href="#">ロゴ</a>
    </div>
    <div class="navbar-right">
      @yield('navbar-right')
    </div>

  </div>
</nav>
@show
