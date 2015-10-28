@section('side-menu')
<?php
$joiningLists = array('とりまる','ラウンドワン');
$managingLists = array('とりまる','ラウンドワン');
?>
{{-- サイドメニュー --}}
<div id="side-menu">
  <ul id="side-menu-content">

    {{-- マイメニューリスト --}}
    <li data-toggle="collapse" href="#collapse-mymenu">
    <a href="#"><span class="caret"></span>マイメニュー</a>
    </li>
    {{-- マイメニューリストアイテム --}}
      <div id="collapse-mymenu" class="collapse list-item">
        <li> <a href="/home.personal-home">マイシフト</a></li>
        <li> <a href="/profile/view">プロフィール</a></li>
        <li> <a href="/salary.home">給与</a></li>
      </div>


    {{-- 参加グループリスト --}}
    <li data-toggle="collapse" href="#collapse-joining-group">
    <a href="#"><span class="caret"></span>参加グループ</a>
      </li>
    {{-- 参加グループリストアイテム --}}
      <div id="collapse-joining-group" class="collapse list-item">
        @foreach($joiningLists as $joiningList)

          <li> <a href="/group.home?name={{ $joiningList }}">{{$joiningList}}</a></li>

        @endforeach
      </div>


    {{-- 管理グループリスト --}}
    <li data-toggle="collapse" href="#collapse-managing-group">
    <a href="#"><span class="caret"></span>管理グループ</a>
    </li>
    {{-- 管理グループリストアイテム --}}
      <div id="collapse-managing-group" class="collapse list-item">
        @foreach($managingLists as $managingList)
          <li> <a href="/group.home?name={{ $managingList }}">{{$managingList}}</a></li>
        @endforeach
      </div>

    <li>
      <a href="/create.group">
        <span class="glyphicon glyphicon-plus"></span>グループ追加
      </a>
    </li>
  </ul>
  {{-- end of #side-menu-content --}}
</div>
{{-- end of #side-menu --}}
@show
