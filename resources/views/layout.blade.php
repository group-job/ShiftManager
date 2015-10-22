<<<<<<< HEAD

<body>




=======
<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>My Blog</title>

  <!-- CSSを追加 -->
  <!-- ① 追加 -->
  <link rel="stylesheet" href="../public/css/app.css">
  <script type="text/javascript" src="../public/js/app.js"></script>
</head>

<body>
  <!-- ナビゲーションバー -->
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
  <!-- end_ナビゲーションバー -->

<!--  サイドメニュー-->
  <div class="col-md-3 sidebar">
    <ul class="nav nav-sidebar navbar-inner">
      <!-- マイメニュー -->
      <li data-toggle="collapse" href="#collapse-mymenu">
        <a href="#">
          <span class="caret"></span>
        </a>
      </li>
      <ul id="collapse-mymenu" class="collapse" style="list-style-type:none;">
        <li>
          <a href="A-1">
            <span class="fa fa-angle-double-right fa-fw"></span>
            <span class="glyphicon glyphicon-stop">A-1</a>
      </ul>
      <br>
      <!-- 参加グループ -->
      <li data-toggle="collapse" href="#collapse-joingroup">
        <a href="#">
          <span class="caret"></span>参加グループ</a>
      </li>
      <ul id="collapse-joingroup" class="collapse" style="list-style-type:none;">
        <li>
          <a href="A-1">
            <span class="fa fa-angle-double-right fa-fw"></span>
            <span class="glyphicon glyphicon-stop">A-1</a>
          <li>
            <a href="A-2">
              <span class="fa fa-angle-double-right fa-fw"></span>
              <span class="glyphicon glyphicon-stop">A-2</a>
      </ul>
      <br>
      <!-- 管理グループ -->
      <li data-toggle="collapse" href="#collapse-admingroup">
        <a href="#">
          <span class="caret"></span>管理グループ</a>
      </li>
      <ul id="collapse-admingroup" class="collapse" style="list-style-type:none;">
        <li>
          <a href="A-1">
            <span class="fa fa-angle-double-right fa-fw"></span> A-1</a>
          <li>
            <a href="A-2">
              <span class="fa fa-angle-double-right fa-fw"></span> A-2</a>
            <li>
              <a href="A-3">
                <span class="fa fa-angle-double-right fa-fw"></span> A-3</a>
      </ul>
      <br>
      <!-- グループ追加 -->
      <li>
        <a href="#">
          <span class="glyphicon glyphicon-plus"></span>グループ追加</a>
      </li>
    </ul>
  </div>
<!-- END_サイドメニュー -->

<!-- メインコンテンツ -->
  <div class="col-md-9">
    @yield('content')
  </div>
>>>>>>> origin/master

</body>

</html>
