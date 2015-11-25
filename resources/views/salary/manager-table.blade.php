<script>
  var hiduke=new Date();
  var year = hiduke.getFullYear();
  var month = hiduke.getMonth()+1;
  var day = hiduke.getDate();
  
  var today=year+"-"+month+"-"+day;

</script>

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
     {{-- @for($i=0; $i < 4; $i++)
      <td>
        <input type="text" name="name" value="">
      </td>
      @endfor --}}
      {{-- 給与区分 --}}
      <td>
        <select name="salary_classe">
          <option></option>
          <option value=0>時給</option>
          <option value=1>日当</option>
          <option value=2>月給</option>
        </select>
      </td>
      {{-- 金額 --}}
      <td>
        <input type="text" name="name" value="">
      </td>
      {{-- 開始年月日 --}}
      <td>
        <input type="date" name="start_date" value="">
      </td>
      {{-- 終了年月日 --}}
      <td>
        <input type="date" name="end_date">
      </td>
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
