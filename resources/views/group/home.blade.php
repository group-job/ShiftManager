@extends('common.layout')
{{-- タイトル部分の表示 --}}
  @section('title-space')
    <div class="container">
      <div class="row">{{-- グループタブ --}}
        <div class="col-lg-5">
          <h1><div id="param">{{ $group->group_name or 'グループ名' }}</div></h1>
        </div>
        <div class="col-lg-7">
          <img src="/img/user_icon.png" alt="" />
          <img src="/img/user_icon.png" alt="" />
          <img src="/img/user_icon.png" alt="" />
          <span class="glyphicon glyphicon-plus" style="font-size:3em;position:relative;top:18px;"></span>
        </div>
      </div>{{-- グループタブ --}}
    </div>
  <div class="row">{{-- タイトル --}}
    <ul class="nav nav-tabs">
      <li><a href="/group/{{ $group->id or 'グループId' }}/shift">シフト表</a></li>
      <li><a href="/group/{{ $groupId->id or 'グループId' }}/infomation">連絡ボード</a></li>
      <li><a href="/group/{{ $groupId->id or 'グループId' }}/chat">チャット</a></li>
      @if(isset($group))
        @if(Auth::user()->id === $group->manager_id)
          <li><a href="/group/{{ $groupId or 'グループId' }}/setting">設定</a></li>
        @endif
      @endif
      {{-- <li class="active"><a href="/group/{{ $groupId }}/join-shift" data-toggle="tab">設定</a></li> --}}
    </ul>
  </div>{{-- タイトル --}}
  @endsection
  @section('contents-space')
    <div class="tab-content">
      <br />
      @yield('tab-space')
    </div>
  @endsection
