{{-- テーブル作成 --}}
<table class="table-bordered">
  <tbody>
     <th>給与区分</th>
     <th>給与金額</th>
     <th>開始年月日</th>
     <th>終了年月日</th>
    <tr>
      <td colspan="5">
        新しい給与を追加する<span class="text-right"><span class="glyphicon glyphicon-plus pull-right"></span>
      </td>
    </tr>
    {{-- 給与追加フォーム --}}
    <tr>
    <form action="" method="post">
      {{-- 給与区分 --}}
      <td>
        <select name="salary_classe">
          <option></option>
          <option value=0>時給</option>
          <option value=1>日給</option>
          <option value=2>月給</option>
        </select>
      </td>
      {{-- 金額 --}}
      <td>
        <input type="text" name="monney" >
      </td>
      {{-- 開始年月日 --}}
      <td>
        <input type="date" name="start_date" value= <?php echo date("Y-m-j");  ?> >
      </td>
      {{-- 終了年月日 --}}
      <td>
        <input type="date" name="end_date">
      </td>
      <td>
        <input type="submit" value="確定">
      </td>
      </form>
    </tr>
    {{-- フォーム終了 --}}
    <tr>
      <td>
        {{ $salary_arry[0][2] }}
      </td>
      <td>
        {{ $salary_arry[0][1] }}円
      </td>
      <td>
          {{ $salary_arry[0][3] }}
      </td>
      <td>
        {{ $salary_arry[0][4] }}
      </td>
      <td>
        <input type="button" name="name" value="変更">
        <input type="button" name="name" value="削除">
      </td>
    </tr>
  </tbody>

</table>
