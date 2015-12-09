@extends('common.layout')


@section('main-contents')
<table>
<tbody>
  <tr>
    <td colspan="2">
      <h1>{{ Auth::user()->name }}さんのアカウント情報</h1>
    </td>
  </tr>
  <tr>
    <td>
      氏名：
    </td>
    <td>
      {{ Auth::user()->name }}
    </td>
  </tr>
  {{-- <tr>
    <td>
      電話番号：
    </td>
    <td>
      {{ $my_profile["phone1"] }}-{{ $my_profile["phone2"] }}-{{ $my_profile["phone3"] }}
    </td>
  </tr> --}}
  <tr>
    <td>
      メールアドレス：
    </td>
    <td>
      {{ Auth::user()->email }}
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
