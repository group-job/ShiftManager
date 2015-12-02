@extends('common.layout')
<<<<<<< HEAD
{{-- タイトル部分の表示 --}}

@section('main-contents')
=======

@section('main-contents')
<?php
  session_start();
  $_SESSION["employments_id"] = array();
?>
>>>>>>> 6352d26fdb7b5863ab407f5e03b05fb8a5d49dee
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
      <form name="approvalform" method="POST" action="/group/{{ $groupId }}/approve">
      {!! Form::token() !!}
      <tr>
        <td>
          {{ $employment->name }}&emsp;さん
        </td>
<<<<<<< HEAD
        <td> 
            <input type="hidden" name="employment_id" value="{{ $employment->id }}">
            <input type="submit" name="approve" value="承認する">
            <input type="submit" name="approve" value="拒否する">
=======
        <td>
<<<<<<< Updated upstream
            <input type="button" id="approvaltrue" value="承認する" onclick="location.href='/group/{{$groupId}}/approval-true?count={{ $count }}'">
=======
            <input type="button" id="approvaltrue" value="承認する" onclick="location.href='/group/{{$groupId}}/approvaltrue?count={{ $count }}'">
>>>>>>> Stashed changes
            <input type="button" id="approvalfalse" value="拒否する" onclick="location.href='/group/{{$groupId}}/approvalfalse?count={{ $count }}'">
>>>>>>> 6352d26fdb7b5863ab407f5e03b05fb8a5d49dee
        </td>
      </tr>
      </form>
    @endforeach
  </tbody>
</table>
</div>
@endsection
