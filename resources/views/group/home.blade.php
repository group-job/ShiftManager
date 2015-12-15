@extends('common.layout')
{{-- タイトル部分の表示 --}}
  @section('title-space')
    <div class="container">
      <div class="row">{{-- グループタブ --}}
        <div class="col-lg-offset-4" id="group-title">
          <h1><div id="param">{{ $group->group_name or 'グループ名' }}</div></h1>
        </div>
      </div>{{-- グループタブ --}}
    </div>
  <div class="row">{{-- タイトル --}}
    <ul class="nav nav-tabs" id="group-tab">
      <li id="shift-tab"><a href="/group/{{ $group->id or 'グループId' }}/shift">シフト表</a></li>
      <li id="information-tab"><a href="/group/{{ $group->id or 'グループId' }}/infomation">連絡ボード</a></li>
      <li id="chat-tab"><a href="/group/{{ $group->id or 'グループId' }}/chat">チャット</a></li>
      @if(isset($group))
        @if(Auth::user()->id === $group->manager_id)
          <li id="setting-tab"><a href="/group/{{ $group->id or 'グループId' }}/setting">設定</a></li>
        @endif
      @endif
      {{-- <li class="active"><a href="/group/{{ $groupId }}/join-shift" data-toggle="tab">設定</a></li> --}}
    </ul>
  </div>{{-- タイトル --}}
  @endsection
  @section('contents-space')
    <div class="tab-content" id="group-tab-contents">
      <br />
      @yield('tab-space')
    </div>
  @endsection
