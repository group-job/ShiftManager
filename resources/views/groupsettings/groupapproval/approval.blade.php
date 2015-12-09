@extends('common.layout')
{{-- タイトル部分の表示 --}}

@section('main-contents')
<div class="col-lg-offset-3">
@if(!empty($employments) && count($employments) > 0)
  下記の方からグループ参加への申請が届いています。
@else
  現在グループ参加への申請は存在しません。
@endif
<script type="text/javascript" src="/js/approval.js"></script>
<table>
  <tbody>
    <!--<tr>-->
    <!--  <td>-->
    <!--    長友涼士　さん-->
    <!--  </td>-->
    <!--  <td>-->
    <!--      <input type="button" name="name" value="承認する">-->
    <!--      <input type="button" name="name" value="拒否する">-->
    <!--  </td>-->
    <!--</tr>-->
    <!--<tr>-->
    <!--  <td>-->
    <!--    牛嶋祥大　さん-->
    <!--  </td>-->
    <!--  <td>-->
    <!--    <input type="button" name="name" value="承認する">-->
    <!--    <input type="button" name="name" value="拒否する">-->
    <!--  </td>-->
    <!--</tr>-->
    @foreach($employments as $employment)
      <form name="approvalform" method="POST" action="/group/{{ $group->id }}/approve">
      {!! Form::token() !!}
      <tr>
        <td>
          {{ $employment->name }}&emsp;さん
        </td>
        <td>
            <input type="hidden" name="employment_id" value="{{ $employment->id }}">
            <input type="submit" name="approve" value="承認する">
            <input type="submit" name="approve" value="拒否する">
        </td>
      </tr>
      </form>
    @endforeach
  </tbody>
</table>
</div>
@endsection
