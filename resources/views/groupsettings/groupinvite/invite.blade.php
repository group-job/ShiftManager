<!-- レイアウトの継承 -->
@extends('common.layout')

@section('main-contents')
<div class="row col-lg-offset-3">
  <h3>招待する</h3>
    URL:{{ url('group/'.$groupId.'/apply')}}
    <br>
    ※上記リンクを招待したい人にメール等で送ってください。
</div>
@endsection
