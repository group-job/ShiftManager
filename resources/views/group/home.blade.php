@extends('common.layout')

{{-- タイトル部分の表示 --}}
  @section('title-space')
    <div class="row">{{-- グループタブ --}}
      <div class="container">
        <div class="col-lg-4">
          <h1><div id="param">{{ $groupName }}</div></h1>
        </div>
        <div class="col-lg-8">
          <img src="/img/user_icon.png" alt="" />
          <img src="/img/user_icon.png" alt="" />
          <img src="/img/user_icon.png" alt="" />
          <span class="glyphicon glyphicon-plus" style="font-size:3em;position:relative;top:18px;"></span>
        </div>
      </div>
    </div>{{-- グループタブ --}}
  <div class="row">{{-- タイトル --}}
    <ul class="nav nav-tabs">
      <li><a href="/group/{{ $groupId }}/shift">シフト表</a></li>
      <li><a href="/group/{{ $groupId }}/infomation">連絡ボード</a></li>
      <li><a href="/group/{{ $groupId }}/chat">チャット</a></li>
      {{-- <li class="active"><a href="/group/{{ $groupId }}/join-shift" data-toggle="tab">設定</a></li> --}}
    </ul>
  </div>{{-- タイトル --}}
  @endsection
  @section('contents-space')
    <div class="tab-content">
      @yield('tab-space')
    </div>
  @endsection
