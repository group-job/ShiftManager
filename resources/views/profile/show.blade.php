@extends('common.layout')


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
      {{ Session::get('user_name')}}
    </td>
  </tr>
  <tr>
    <td>
      電話番号：
    </td>
    <td>
      {{-- {{ $my_profile["phone"] }} --}}
    </td>
  </tr>
  <tr>
    <td>
      メールアドレス：
    </td>
    <td>
      {{-- {{ $my_profile["email"] }} --}}
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
      {!! link_to('profile/edit', 'アカウント情報を変更する') !!}
    </td>
  </tr>
</tbody>

</table>


@endsection
