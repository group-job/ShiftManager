<head>
  <meta charset="UTF-8">
  <title>@yield('title','名前はまだない')</title>

  <!-- CSSを追加 -->
  <!-- ① 追加 -->
  <link rel="stylesheet" href="/css/app.css">
  @yield('add-css')
  @section('modify-js')
  <script type="text/javascript" src="/js/app.js"></script>
  @show

</head>
