<!-- レイアウトの継承 -->
@extends('common.layout')

{{-- @section('modify-js')
  @parent
  <script type="text/javascript" src="/js/profile.js"></script>
@show --}}

<!-- この中身にかく -->
@section('main-contents')
@include('common.form-alert')
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
  <tr>
    <td>
      @include('profile.form.phone')
    </td>
  </tr>


</tbody>
</table>
{{-- とりあえずここに --}}
<script type="text/javascript" src="/js/profile.js"></script>
@endsection
