@section('navi_menu')
<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid top-menu">
     {{-- スマートフォンサイズで表示されるメニューボタンとテキスト --}}
    <div class="navbar-header">

      {{-- タイトルなどのテキスト --}}
      <a class="navbar-brand" href="/"></a>
    </div>
    <div class="navbar-right">
      @section('navbar-right')
        @if (Auth::check())
             {{ Auth::user()->name }}
        @endif
        <a href="/auth/logout"><img src="/img/icon-cat.png" alt="" width="45" height="45"/></a>
      @show
    </div>

  </div>
</nav>
@show
