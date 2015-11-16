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
  <div class="col-md-offset-3">
    <ul id="explanatory-notes">
      <li><div class="circle" id="circle0"></div>希望</li>
      <li><div class="circle" id="circle1"></div>仮確定</li>
      <li><div class="circle" id="circle2"></div>確定</li>
    <li><div class="circle" id="circle3"><span class="circle-text">赤文字</span></div>削除依頼</li>
    </ul>
  </div>

  <form action="/personal/request-delete" class="form-horizontal" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="input-request-delete">
    <button type="submit" class="btn btn-danger togglable" id="button-request-delete" style="position:absolute; z-index:1;">削除依頼</button>
  </form>

  <form action="/personal/test" class="form-horizontal" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="testInput" name="id" value="1">
    <button type="submit" class="btn btn-danger togglable" id="testButton" style="position:absolute; z-index:1; ">test</button>
  </form>
@stop
