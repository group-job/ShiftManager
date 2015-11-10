<!-- レイアウトの継承 -->
@extends('common.layout')

{{-- タイトル部分の表示 --}}
@section('title-space')
@include('group.title-name')
@endsection

@section('contents-space')
<div class="row col-lg-offset-3">
  <h3>招待する</h3>
    URL:kimiyakimiya.jp
    <br>
    ※上記リンクを招待したい人にメール等で送ってください。
</div>
@endsection
