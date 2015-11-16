<!-- レイアウトの継承 -->
@extends('common.layout')
<link rel="stylesheets" type="text/scss" href="resources/assets/sass/apply.scss">

{{-- タイトル部分の表示 --}}
@section('title-space')
@include('group.title-name')
@endsection

@section('contents-space')
<div class="row col-lg-offset-3">
  とりまるに参加申請をしますか？<br>
  管理者:牛嶋<usshi@gmail.com><br>
  URL:http://kimiya.com/group-kimiya
  <div class="container col-lg-offset-2">
    <div class="col-lg-4">
      <input type="button" id="notapply" name="notapply" value="申請しない">
    </div>
    <div class="col-lg-4">
      <input type="button" id="apply" name="apply" value="申請する" onclick="location.href='http://localhost:8888'">
    </div>
  </div>

</div>
@endsection
