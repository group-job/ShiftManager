@extends('common.layout')
@section('title')
ホーム
@stop
@section('modify-js')
@parent
@include('personal.part-create-calendar')
@endsection
@section('title-space')
  <div class="col-md-offset-4 col-md-4"><h1>マイシフト</h1></div>
@stop
@section('contents-space')
{{-- カレンダーにイベントを追加するためのスクリプト --}}
  <div id='calendar'></div>
  {{-- カレンダーイベントの凡例 --}}
  <div class="col-md-offset-3">
    <ul id="explanatory-notes">
      <li><div class="circle" id="circle0"></div>希望</li>
      <li><div class="circle" id="circle1"></div>仮確定</li>
      <li><div class="circle" id="circle2"></div>確定</li>
    <li><div class="circle" id="circle3"><span class="circle-text">赤文字</span></div>削除依頼中</li>
    </ul>
  </div>
  {{-- 削除依頼ボタンのフォーム --}}
  <form action="/personal/request-delete" id="form-request-delete" class="form-horizontal" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="shift-id" id="input-request-delete">
    <button type="button"class="btn btn-danger togglable" id="button-request-delete" style="position:absolute; z-index:1;">削除依頼</button>
  </form>
  {{-- イベント詳細表示用ツールチップ --}}

  {{-- テスト用フォーム --}}
  <form action="/personal/test" id="test-form" class="form-horizontal" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="testInput" name="id" value="1">
    <input type="hidden" name="name" value="kimiya">
    <button type="button" onclick="test('test-form')" class="btn btn-danger custom-tooltip"  title="This is my div's tooltip message!" id="testButton" style="position:absolute; z-index:1; ">test</button>
  </form>
@stop
