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
      {{ $salary_arry[0][0] }}
    </td>
    <td>
       {{ $salary_arry[0][1] }}円({{ $salary_arry[0][2] }})
    </td>
    <td>
      30000
    </td>
  </tr>
</tbody>

</table>
@endsection
