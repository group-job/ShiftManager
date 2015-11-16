@extends('common.layout')
{{-- タイトル部分の表示 --}}
@section('title-space')
@include('group.title-name')
@endsection

@section('contents-space')
<div class="col-lg-offset-3">
下記の方からグループ参加への申請が届いています。
<table>
  <tbody>
    <tr>
      <td>
        長友涼士　さん
      </td>
      <td>
          <input type="button" name="name" value="承認する">
          <input type="button" name="name" value="拒否する">
      </td>
    </tr>
    <tr>
      <td>
        牛嶋祥大　さん
      </td>
      <td>
        <input type="button" name="name" value="承認する">
        <input type="button" name="name" value="拒否する">
      </td>
    </tr>
  </tbody>
</table>
</div>
@endsection
