@section('main-contents')
  <div id="main-contents">
    <div id="title-space">
      @yield('title-space','サブタイトル')
    </div>
    <div id="contens-space">
      @section('contens-space')
      @show
    </div>
  </div>
@show
