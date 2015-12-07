@extends('group.home')
@section('title')
グループシフト
@stop
@section('modify-js')
@parent
@include('group.part-manager-calendar')
@endsection
@section('tab-space')
  <div id='manager-calendar'>
  </div>

@endsection
