@extends('group.home')
@section('title')
グループシフト
@stop
@section('modify-js')
@parent
@include('group.part-manager-calendar')
@include('group.part-manager-scheduler')
@endsection
@section('tab-space')
  <div class="row">
    <div class="col-md-3">
      <div id='manager-calendar'></div>
    </div>
    <div class="col-md-9">
      <div id="manager-scheduler"></div>
    </div>

  </div>

@endsection
