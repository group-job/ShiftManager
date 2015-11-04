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
      <h1>新規登録</h1>
    </td>
  </tr>
{!! Form::open() !!}
{{-- 氏名 --}}
  <tr>
    <td class="col-md-6">
      {!! Form::label('name', '氏名:') !!}
    </td>
    <td>
      {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </td>
  </tr>
{{-- 電話番号 --}}
  <tr>
    <td class="col-md-6">
      {!! Form::label('tel', '電話番号:') !!}
    </td>
    <td>
      {!! Form::text('tel', null, ['class' => 'form-control']) !!}
    </td>
  </tr>
{{-- メールアドレス --}}
<tr>
  <td class="col-md-6">
    {!! Form::label('mailaddress', 'メールアドレス:') !!}
  </td>
  <td>
    {!! Form::text('mailaddress', null, ['class' => 'form-control']) !!}
  </td>
</tr>
{{-- 再入力 --}}
<tr>
  <td class="col-md-6">
    {!! Form::label('mailaddres-conf', 'メールアドレス(再入力):') !!}
  </td>
  <td>
    {!! Form::text('mailaddress-conf', null, ['class' => 'form-control']) !!}
  </td>
</tr>

{{-- 現在パスワード --}}
<tr>
  <td class="col-md-6">
    {!! Form::label('password', '現在のパスワード:') !!}
  </td>
  <td>
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
  </td>
</tr>
{{-- 確認用 --}}
<tr>
  <td class="col-md-6">
    {!! Form::label('password-conf', 'パスワード(再入力):') !!}
  </td>
  <td>
    {!! Form::text('password-conf', null, ['class' => 'form-control']) !!}
  </td>
</tr>
</tbody>
</table>

<div class="col-md-offset-1">
  <button type="button" class="btn btn-default">キャンセル
  </button>
  <button type="button" class="btn btn-default" onclick="location.href='http://localhost:8888/create.account-check'">
    確認
  </button>
        {{-- {!! Form::submit('キャンセル', ['class' => 'btn btn-primary']) !!} --}}
        {{-- {!! Form::submit('確認', ['class' => 'btn btn-primary']) !!} --}}
{!! Form::close() !!}
</div>
@stop
