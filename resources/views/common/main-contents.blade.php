@section('main-contents')
  <div id="main-contents" class="row">
    <div id="title-space" class="container">
      {{-- @yield('title-space','サブタイトル') --}}
      @section('title-space')
      @show
    </div>
    <br><br>
    <div id="contents-space" class="container">
      @section('contents-space')
      @show
    </div>
  </div>
@show
