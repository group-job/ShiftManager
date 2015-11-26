@extends('common.layout')
@section('main-contents')
<div class="col-lg-offset-3">
下記の方からグループ参加への申請が届いています。
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
    <form name=approvalform>
      @foreach($employments as $employment)
      <tr>
        <td>
          {{ $employment->name }}　さん
        </td>
        <td>
            <input type="button" name="name" value="承認する">
            <input type="button" name="name" value="拒否する">
        </td>
      </tr>
      @endforeach
    </form>
  </tbody>
</table>
</div>
@endsection
