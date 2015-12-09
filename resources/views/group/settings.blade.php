@extends('group.home')

@section('tab-space')

<div class="row col-lg-offset-2 col-lg-6">
<div style="margin-top:20px;"></div>
<table class="table table-responsive">
  <tbody>
    <tr>
        <th>
          グループ名の変更：
        </th>
      <td>
        <input type="text" name="name" value="">
        <input type="button" name="name" value="変更" class="btn btn-primary">
      </td>
    </tr>
    <tr>
      <th>
        管理者の変更：
      </th>
      <td colspan="2">
        <select class="" name="" multiple="">
          <option value="サンプル1">店長</option>
          <option value="サンプル1">やすなが</option>
        </select>
      </td>
    </tr>
    <tr>
      <th class="col-lg-3">
        メンバー招待
      </th>
      <td class="col-lg-7">
        <input type="button" name="name" value="招待画面へ" onclick="location.href='invite'" class="btn btn-primary">
      </td>
    </tr>
    <tr>
      <th>
        メンバー承認
      </td>
      <td>
        <input type="button" name="name" value="承認画面へ" onclick="location.href='approval'" class="btn btn-primary">
      </th>
    </tr>
    <tr>
      <th>
        メンバー削除
      </th>
      <td>
        <input type="button" name="name" value="削除画面へ" class="btn btn-primary">
      </td>
    </tr>
  </tbody>
</table>
</div>

@endsection
