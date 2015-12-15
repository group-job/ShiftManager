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
  <th>
    先月の給料
  </th>
  @foreach ($salary_arry as $value => $ctk)
    @for ($count = 1; $count < count($ctk) ; $count=$count+4)
    <tr>
      <td>
        {{ $ctk[0] }}
      </td>
      <td>
         {{ $ctk[$count] }}円({{ $ctk[$count+1] }})
      </td>
      <td>
        未実装
      </td>
      <td>
        未実装
      </td>
    </tr>
    @endfor
  @endforeach
</tbody>

</table>
@endsection
