@extends('salary.home')
@section('tab-space')
<table class="table-bordered">
<tbody>
  <th>
    グループ
  </th>
  <th>
    現在の給与
  </th>
  <th>
    今月の給料
  </th>
  <tr>
    <td>
      とりまる
    </td>
    <td>
       750円(時給)
    </td>
    <td>
      {{ $groupids[] }}
    </td>
  </tr>
  <tr>
    <td>
      ラウンドワン
    </td>
    <td>
       3750円(日給)
    </td>
    <td>
      30000
    </td>
  </tr>
  <tr>
    <td>
      合計
    </td>
    <td colspan="2">
      90000
    </td>
  </tr>
</tbody>

</table>
@endsection
