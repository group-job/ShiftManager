<!-- レイアウトの継承 -->
@extends('common.layout')

<!-- サイドメニューを消したい時にかく -->
@section('side_menu')
@overwrite
<!-- ここまで -->

<!-- この中身にかく -->
@section('main-contents')

<table>
<tbody>
  <tr>
    <td colspan="2">
      <h1>きみやさんのアカウント情報変更</h1>
    </td>
  </tr>
{!! Form::open() !!}
{{-- 氏名 --}}
  <tr>
    <td class="col-md-6">
      {!! Form::label('name', '新しい名前:') !!}
    </td>
    <td>
      {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </td>
  </tr>
{{-- 電話番号 --}}
  <tr>
    <td class="col-md-6">
      {!! Form::label('tel', '新しい電話番号:') !!}
    </td>
    <td>
      {!! Form::text('tel', null, ['class' => 'form-control']) !!}
    </td>
  </tr>
{{-- メールアドレス --}}
<tr>
  <td class="col-md-6">
    {!! Form::label('mailaddress', '新しいメールアドレス:') !!}
  </td>
  <td>
    {!! Form::text('mailaddress', null, ['class' => 'form-control']) !!}
  </td>
</tr>
{{-- 再入力 --}}
<tr>
  <td class="col-md-6">
    {!! Form::label('mailaddres-conf', '新しいメールアドレス(再入力):') !!}
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
{{-- 新しい --}}
<tr>
  <td class="col-md-6">
    {!! Form::label('new-password', '新しいパスワード:') !!}
  </td>
  <td>
    {!! Form::text('new-password', null, ['class' => 'form-control']) !!}
  </td>
</tr>
{{-- 確認用 --}}
<tr>
  <td class="col-md-6">
    {!! Form::label('password-conf', '新しいパスワード(再入力):') !!}
  </td>
  <td>
    {!! Form::text('password-conf', null, ['class' => 'form-control']) !!}
  </td>
</tr>
{{-- 画像 --}}
<tr>
  <td class="col-md-6">
    {!! Form::label('image', '画像:') !!}
  </td>
  <td>
    {{-- {!! Form::text('image', null, ['class' => 'form-control']) !!} --}}
    <input type="text" name="name" value="">
    <input type="button" name="image" value="画像選択" class="btn btn-default">
  </td>
</tr>

</tbody>
</table>

<div class="col-md-offset-1">
  <button type="button" class="btn btn-default">キャンセル
  </button>
  <button type="button" class="btn btn-default" onclick="location.href='http://localhost:8888/profile.check'">
    確認
  </button>
        {{-- {!! Form::submit('キャンセル', ['class' => 'btn btn-primary']) !!} --}}
        {{-- {!! Form::submit('確認', ['class' => 'btn btn-primary']) !!} --}}
{!! Form::close() !!}

@endsection
<!-- ここまで -->
