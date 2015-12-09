<!-- レイアウトの継承 -->
@extends('common.layout')
  @section('title-space')
    <div class="row">{{-- タイトル --}}
      <div class="container">
        <div class="col-lg-4">
          <h1>給与</h1>
        </div>
      </div>
    </div>{{-- グループタブ --}}
  <div class="row">{{-- グループタブ --}}
    <ul class="nav nav-tabs">
      <li><a href="/salary/list">給与一覧</a></li>
      <li><a href="/salary/manager">給与管理</a></li>
    </ul>
  </div>{{-- グループタブ --}}
  @endsection

  @section('contents-space')
    <div class="tab-content">
      <br>
      @yield('tab-space')
    </div>
  @endsection
