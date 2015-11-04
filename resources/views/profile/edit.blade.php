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
      <h1>{{ Session::get('user_name')}}さんのアカウント情報変更</h1>
    </td>
  </tr>
  <tr>
    <td>
        @include('profile.form.name')
    </td>
  </tr>


</tbody>
</table>

@endsection
<!-- ここまで -->
