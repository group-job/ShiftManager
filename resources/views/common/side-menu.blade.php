
@section('side-menu')
<?php
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
        <li> <a href="/personal/home">マイシフト</a></li>
        <li> {!! link_to('profile/show', 'プロフィール') !!}</a></li>
        <li> <a href="/salary.home">給与</a></li>
      </div>


    {{-- 参加グループリスト --}}
    <li data-toggle="collapse" href="#collapse-joining-group">
    <a href="#"><span class="caret"></span>参加グループ</a>
      </li>
    {{-- 参加グループリストアイテム --}}
      <div id="collapse-joining-group" class="collapse list-item">
        @if(isset($join_group))
          @foreach($join_group as $value)
           <li><a href="/group/{{ $value->id }}/home">{{ $value->group_name}}</a></li>
          @endforeach
        @endif
      </div>


    {{-- 管理グループリスト --}}
    <li data-toggle="collapse" href="#collapse-managing-group">
    <a href="#"><span class="caret"></span>管理グループ</a>
    </li>
    {{-- 管理グループリストアイテム --}}
      <div id="collapse-managing-group" class="collapse list-item">
        @if(isset($manager_group))
          @foreach($manager_group as $value)
            <li> <a href="/group/{{ $value->id }}/home">{{ $value->group_name }}</a></li>
          @endforeach
        @endif
      </div>

    <li>
      <span class="glyphicon glyphicon-plus">{!! link_to('/group_create/edit', 'グループ追加') !!}
      </a>
    </li>
  </ul>
  {{-- end of #side-menu-content --}}
</div>
{{-- end of #side-menu --}}
@show
