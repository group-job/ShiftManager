<head>
  <meta charset="UTF-8">
  <title>@yield('title','名前はまだない')</title>
  {{-- <title>{{ $title }}</title> --}}

  <!-- CSSを追加 -->
  <!-- ① 追加 -->
  @section('modify-css')
  <link rel="stylesheet" href="/css/app.css">
  @show
  @section('modify-js')
  <script type="text/javascript" src="/js/app.js"></script>
  @show

</head>
