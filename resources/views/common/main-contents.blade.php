@section('main-contents')
  <div id="main-contents">
    <div id="title-space">
      @yield('title-space','サブタイトル')
    </div>
    <div id="contens-space">
      @section('contents-space')
      @show
    </div>
  </div>
@show
