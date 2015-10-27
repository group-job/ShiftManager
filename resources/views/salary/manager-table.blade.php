{{-- テーブル作成 --}}
<?php
  const SALARY_KBN = "給与区分";
  const SALARY_MONEY = "給与金額";
  const START_DAY = "開始年月日";
  const END_DAY = "終了年月日";
  $salaryArray= array(SALARY_KBN,SALARY_MONEY,START_DAY,END_DAY);
 ?>
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
