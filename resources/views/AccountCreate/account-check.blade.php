@extends('common.layout')

{{-- サイドメニューを消す --}}
@section('side-menu')
@stop
@section('contents')
<div class="col-lg-offset-4">
<table>
<tbody>
  <tr>
    <td colspan="2">
      <h1>新規登録確認</h1>
    </td>
  </tr>
{!! Form::open() !!}
{{-- 氏名 --}}
  <tr>
    <td class="col-md-6">
      氏名
    </td>
    <td>
      吉川公也
    </td>
  </tr>
{{-- 電話番号 --}}
  <tr>
    <td class="col-md-6">
      電話番号
    </td>
    <td>
      090-1234-1234
    </td>
  </tr>
{{-- メールアドレス --}}
<tr>
  <td class="col-md-6">
    メールアドレス
  </td>
  <td>
    kimiya@kimiya.com
  </td>
</tr>

</tbody>
</table>

<div class="col-md-offset-1">
  <button type="button" class="btn btn-default">訂正
  </button>
  <button type="button" class="btn btn-default" onclick="location.href='http://localhost:8888/'">
    登録
  </button>
        {{-- {!! Form::submit('キャンセル', ['class' => 'btn btn-primary']) !!} --}}
        {{-- {!! Form::submit('確認', ['class' => 'btn btn-primary']) !!} --}}
{!! Form::close() !!}
</div>
@stop
