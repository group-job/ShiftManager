<!-- レイアウトの継承 -->
@extends('common.layout')
<link rel="stylesheets" type="text/scss" href="resources/assets/sass/apply.scss">

{{-- タイトル部分の表示 --}}
@section('title-space')
@include('group.title-name')
@endsection

@section('contents-space')
<div class="row col-lg-offset-3">
  @if(!$checkapply && $checkgroup)
    {{ $group->group_name }}に参加申請をしますか？<br>
    管理者:{{ $group->name }}<usshi@gmail.com><br>
    URL:{{ url('group/'.$id.'/apply')}}
    <div class="container col-lg-offset-2">
      <div class="col-lg-4">
        <input type="button" id="notapply" name="notapply" value="申請しない" onclick="location.href='/personal/home'">
      </div>
      <div class="col-lg-4">
        <input type="button" id="apply" name="apply" value="申請する" onclick="location.href='applyed'">
      </div>
    </div>
  @elseif($checkgroup)
    既に{{ $group->group_name }}に参加申請をしています。<br>
    管理者:{{ $group->name }}<usshi@gmail.com><br>
    URL:{{ url('group/'.$id.'/apply')}}
  @else
    お探しのグループは存在しません。
  @endif
</div>
@endsection
