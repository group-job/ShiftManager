@extends('common.layout')
@section('title')
ホーム
@stop
@section('title-space')
  <div class="col-md-offset-4 col-md-4"><h1>マイシフト</h1></div>
@endsection
@section('contens-space')
  <script>
    $('#calendar').fullCalendar();
  </script>
  <div id="calendar"></div>


@endsection
