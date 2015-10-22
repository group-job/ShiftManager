<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>

    <!-- CSSを追加 --><!-- ① 追加 -->
    <link rel="stylesheet" href="../public/css/app.css">
    <script type="text/javascript" src="../public/js/app.js"></script>
</head>

<body>
  <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="container-fluid top-menu">
          <!-- スマートフォンサイズで表示されるメニューボタンとテキスト -->
          <div class="navbar-header">

            <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-menu-4">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> -->

            <!-- タイトルなどのテキスト -->
            <a class="navbar-brand" href="#">ロゴ</a>
          </div>
          <div class="navbar-right">
          <span class="badge">0</span>
          ここ画像！！！！！画像
          </div>

        </div>
      </nav>
</nav>
</nav>
<div class="col-md-3 sidebar">
  @yield('menu')
</div>
<div class="col-md-9">
  @yield('content')
</div>

</body>
</html>
