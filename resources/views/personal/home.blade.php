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
@stop
