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
      <a class="navbar-brand" href="/">ロゴ</a>
    </div>
    <div class="navbar-right">
      @section('navbar-right')
      @if (Auth::guest())
        {{-- ログインしていない時 --}}
        <button id="login-botton" class="btn btn-primary" data-toggle="modal" data-target="#login-modal" >
          ログイン
        </button>
        <button id="login-botton" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal" >
          新規登録
        </button>
        @else
        <img src="img/icon-cat.png" alt="" width="45" height="45"/>
         {{ Auth::user()->name }}さん
        @endif
      @show
    </div>

  </div>
</nav>
@show
