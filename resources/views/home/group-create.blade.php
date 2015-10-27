<!-- レイアウトの継承 -->
@extends('common.layout')


<!-- この中身にかく -->
@section('main-contents')
<div class="row col-lg-offset-3">
<h1>新規グループの作成</h1>
<br>
グループ名：
<input type="text" name="name" value="">
<br>
<br>
<input type="button" name="name" value="作成" class="col-lg-offset-2">
</div>
@endsection
<!-- ここまで -->
