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
    {{-- 給与追加フォーム --}}
    <tr>
     {{-- @for($i=0; $i < 4; $i++)
      <td>
        <input type="text" name="name" value="">
      </td>
      @endfor --}}
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
