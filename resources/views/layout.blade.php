<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>

    <!-- CSSを追加 --><!-- ① 追加 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style media="screen">
    .sitename{
  margin:15px 0 15px;
}
.sitename a{
  font-size: 1.6em;
  color: inherit;
}

i{
  font-size: 1.3em;
  color: inherit;
}

.navbar .navbar-inner {
  padding: 0;
}

.navbar .nav {
  margin: 0;
  display: table;
  width: 100%;
}

.navbar .nav li {
  display: table-cell;
  float: none;
}

.navbar .nav li a {
  font-weight: bold;
  text-align: center;
  border-left: 1px solid rgba(255, 255, 255, .75);
  border-right: 1px solid rgba(0, 0, 0, .1);
}

.navbar .nav li:last-child a {
  border-right: 0;
  border-radius: 0 3px 3px 0;
}
    </style>
</head>

<body>
  <!-- Static navbar -->
<div class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle"
      data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
      <li><a href="#">
             <i class="fa fa-home"></i>  Home</a></li>
      <li><a href="#about">
             <i class="fa fa-info"></i>  About</a></li>
      <li><a href="#about">
            <i class="fa fa-jpy"></i>  Price</a></li>
      <li><a href="#contact">
            <i class="fa fa-comments-o"></i>  Contact</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
  </div>

    <div class="container"><!-- ② 追加 -->
        @yield('content')
    </div>

    <!-- Scripts --><!-- ③ 追加 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
