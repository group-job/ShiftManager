@extends('common.layout')
@section('title')
ホーム
@stop

@section('modify-css')
@parent
<link href='/css/fullcalendar.css' rel='stylesheet' />
<link href='/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<link rel="stylesheet" href="/css/alertify.core.css" />
<link rel="stylesheet" href="/css/alertify.default.css" />
@endsection
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
  <form action="/personal/delete-shift" class="form-horizontal" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="3">
    <button type="submit" class="btn btn-danger" id="deleteButton" style="position:absolute;">削除依頼</button>
  </form>

  <form action="/personal/test" class="form-horizontal" method="get">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="3">
    <input type="hidden" name="name" value="きみや">
    <button type="submit" class="btn btn-danger" id="deleteButton" style="position:absolute;">test</button>
  </form>

@stop
