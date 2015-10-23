@section('side-menu')
<?php
$myLists = array('aaa','bbb','ccc');
$joiningLists = array('aaa','bbb','ccc');
$managingLists = array('aaa','bbb','ccc');
?>
{{-- サイドメニュー --}}
<div class="side-menu">
  <ul class="side-menu-content">

    {{-- マイメニューリスト --}}
    <li data-toggle="collapse" href="#collapse-mymenu">
    <span class="caret"></span>マイメニュー
    {{-- マイメニューリストアイテム --}}
      <ul id="collapse-mymenu" class="collapse">
        @foreach($myLists as $myList)
          <li>{{$myList}}</li>
        @endforeach
      </ul>
    </li>

    {{-- 参加グループリスト --}}
    <li data-toggle="collapse" href="#collapse-joining-group">
    <span class="caret"></span>参加グループ
    {{-- 参加グループリストアイテム --}}
      <ul id="collapse-joining-group" class="collapse">
        @foreach($joiningLists as $joiningList)
          <li>{{$joiningList}}</li>
        @endforeach
      </ul>
    </li>

    {{-- 管理グループリスト --}}
    <li data-toggle="collapse" href="#collapse-managing-group">
    <span class="caret"></span>管理グループ
    {{-- 管理グループリストアイテム --}}
      <ul id="collapse-managing-group" class="collapse">
        @foreach($managingLists as $managingList)
          <li>{{$managingList}}</li>
        @endforeach
      </ul>
    </li>
    <li>
      <a href="#">
        <span class="glyphicon glyphicon-plus"></span>グループ追加
      </a>
    </li>
  </ul>
  {{-- end of .side-menu-content --}}
</div>
{{-- end of .side-menu --}}
@show
