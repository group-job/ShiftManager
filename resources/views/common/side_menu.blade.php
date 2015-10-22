@section('side_menu')

<ul class="nav nav-sidebar navbar-inner">
  <!-- マイメニュー -->
  <li data-toggle="collapse" href="#collapse-mymenu">
    <a href="#">
      <span class="caret"></span>マイメニュー
    </a>
  </li>
<ul id="collapse-mymenu" class="collapse" style="list-style-type:none;">
  <li>
    <a href="A-1">
      <span class="fa fa-angle-double-right fa-fw"></span>
      <span class="glyphicon glyphicon-stop">A-1</span>
    </a>
  </li>
</ul>
<br />
  <!-- 参加グループ -->
  <li data-toggle="collapse" href="#collapse-joingroup">
    <a href="#">
      <span class="caret"></span>参加グループ
    </a>
  </li>
<ul id="collapse-joingroup" class="collapse" style="list-style-type:none;">
  <li>
    <a href="A-1">
      <span class="fa fa-angle-double-right fa-fw"></span>
      <span class="glyphicon glyphicon-stop">A-1
    </a>
   <li>
      <a href="A-2">
        <span class="fa fa-angle-double-right fa-fw"></span>
        <span class="glyphicon glyphicon-stop">A-2
      </a>
    </li>
</ul>
<br />
  <!-- 管理グループ -->
  <li data-toggle="collapse" href="#collapse-admingroup">
    <a href="#">
      <span class="caret"></span>管理グループ
    </a>
  </li>
<ul id="collapse-admingroup" class="collapse" style="list-style-type:none;">
  <li>
    <a href="A-1">
      <span class="fa fa-angle-double-right fa-fw"></span> A-1
    </a>
  </li>
  <li>
    <a href="A-2">
      <span class="fa fa-angle-double-right fa-fw"></span> A-2
    </a>
   </li>
  <li>
    <a href="A-3">
      <span class="fa fa-angle-double-right fa-fw"></span> A-3
    </a>
  </li>
<br />
</ul>
<!-- グループ追加 -->
<ul>
  <li>
    <a href="#">
      <span class="glyphicon glyphicon-plus"></span>グループ追加
    </a>
  </li>
</ul>

@show
