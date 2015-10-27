<!-- レイアウトの継承 -->
@extends('common.layout')

<!-- サイドメニューを消したい時にかく -->
@section('side_menu')
@overwrite
<!-- ここまで -->

<!-- この中身にかく -->
@section('main-contents')
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
      吉川　公也
    </td>
  </tr>
  <tr>
    <td>
      電話番号：
    </td>
    <td>
      090-0000-0000
    </td>
  </tr>
  <tr>
    <td>
      メールアドレス：
    </td>
    <td>
      kimiya@kimiya.com
    </td>
  </tr>
  <tr>
    <td>
      画像：
    </td>
    <td>
      ここに画像
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <a href="/profile/edit"><span>アカウント情報を変更する</span></a>
    </td>
  </tr>
</tbody>

</table>

@endsection
<!-- ここまで -->
