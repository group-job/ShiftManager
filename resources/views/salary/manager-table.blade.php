{{-- テーブル作成 --}}

<table class="table-bordered">
  <tbody>
     @foreach($salaryArray as  $value)
       <th>{{ $value }}</th>
     @endforeach
     <th></th>
    <tr>
      <td colspan="5">
        新しい給与を追加する<span class="text-right"><span class="glyphicon glyphicon-plus pull-right"></span>
      </td>
    </tr>
    <tr>
      @for($i=0; $i < 4; $i++)
      <td>
        <input type="text" name="name" value="">
      </td>
      @endfor
      <td>
        <input type="button" name="name" value="確定">
      </td>
    </tr>
    <tr>
      <td>
        日給
      </td>
      <td>
        3750
      </td>
      <td>
          2015/09/01
      </td>
      <td>
        未入力
      </td>
      <td>
        <input type="button" name="name" value="変更">
        <input type="button" name="name" value="削除">
      </td>
    </tr>
    <tr>
      <td>
        月給
      </td>
      <td>
        3750
      </td>
      <td>
          2015/09/01
      </td>
      <td>
        未入力
      </td>
      <td>
        <input type="button" name="name" value="変更">
        <input type="button" name="name" value="削除">
      </td>
    </tr>
  </tbody>

</table>
