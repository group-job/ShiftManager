<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>

    <!-- CSSを追加 --><!-- ① 追加 -->
    <link rel="stylesheet" href="../public/css/app.css">
</head>

<body>
  <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="container-fluid">

          <!-- スマートフォンサイズで表示されるメニューボタンとテキスト -->
          <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-menu-4">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- タイトルなどのテキスト -->
            <a class="navbar-brand" href="#">Designup.jp</a>

          </div>

          <!-- グローバルナビの中身 -->
          <div class="collapse navbar-collapse" id="nav-menu-4">

            <!-- 各ナビゲーションメニュー -->
            <ul class="nav navbar-nav">

              <!-- 通常のリンク -->
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>

              <!-- ドロップダウンのメニューも配置可能 -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>

            </ul>


          </div>
        </div>
      </nav>
</nav>
</nav>
<div class="col-md-3">
</div>
<div class="col-md-9 login-layout">
  <table>
<tbody>
{!! Form::open() !!}
{{-- メールアドレス --}}
    <tr>
      <td class="col-md-6">
        {!! Form::label('mailaddress', 'メールアドレス:') !!}
      </td>
      <td>
        {!! Form::text('mailaddress', null, ['class' => 'form-control']) !!}
      </td>
    </tr>
{{-- パスワード --}}
    <tr>
      <td class="col-md-6">
        {!! Form::label('password', 'パスワード:') !!}
      </td>
      <td>
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
      </td>
    </tr>
  </tbody>
  </table>
  <br>
    <div class="col-md-offset-1">
            {!! Form::submit('ログイン', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
<h3><a href="#">新規登録はこちら</a></h3>
<h1>サイト説明</h1>
<h2>内容</h2>
</div>
</body>
</html>
