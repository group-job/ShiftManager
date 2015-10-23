@extends('common.layout')

@section('side_menu')
@overwrite

@section('content')
<table>
<tbody>
  <tr>
    <td colspan="2">
      <h1>きみやさんのアカウント情報</h1>
    </td>
  </tr>
  <tr>
    <td>
      氏名：
    </td>
    <td>
      きみや
    </td>
  </tr>
  <tr>
    <td>
      電話番号：
    </td>
    <td>
      きみや
    </td>
  </tr>
  <tr>
    <td>
      メールアドレス：
    </td>
    <td>
      きみや
    </td>
  </tr>
  <tr>
    <td>
      画像：
    </td>
    <td>
      きみや
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <a href="/ShiftManager/public/profile_edit"><span>アカウント情報を変更する</span></a>
    </td>
  </tr>
</tbody>

</table>


@endsection
