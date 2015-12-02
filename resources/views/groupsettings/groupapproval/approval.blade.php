@extends('common.layout')

@section('main-contents')
<?php
  session_start();
  $_SESSION["employments_id"] = array();
?>
<div class="col-lg-offset-3">
@if(!empty($employments) && count($employments) > 0)
  下記の方からグループ参加への申請が届いています。
@else
  現在グループ参加への申請は存在しません。
@endif
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
    <?php $count=0; ?>
    @foreach($employments as $employment)
      <form name="approvalform" method="POST">
      <tr>
        <td>
          {{ $employment->name }}&emsp;さん
        </td>
        <td>
<<<<<<< Updated upstream
            <input type="button" id="approvaltrue" value="承認する" onclick="location.href='/group/{{$groupId}}/approval-true?count={{ $count }}'">
=======
            <input type="button" id="approvaltrue" value="承認する" onclick="location.href='/group/{{$groupId}}/approvaltrue?count={{ $count }}'">
>>>>>>> Stashed changes
            <input type="button" id="approvalfalse" value="拒否する" onclick="location.href='/group/{{$groupId}}/approvalfalse?count={{ $count }}'">
        </td>
      </tr>
      <?php $_SESSION["employments_id"][$count] = $employment->id; ?>
      </form>
      <?php $count++; ?>
    @endforeach
  </tbody>
</table>
</div>
@endsection
