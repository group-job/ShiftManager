@extends('common.layout')
@section('side_menu')
@overwrite

@section('content')

<table>
<tbody>
{!! Form::open() !!}
{{-- メールアドレス --}}
  <tr>
    <td class="col-md-6">
      {!! Form::label('mailaddress', 'メールアドレス:') !!}
    </td>
    <td>
      {!! Form::text('mailaddress', null, ['class' => 'form-control']) !!}
    </td>
  </tr>
{{-- パスワード --}}
  <tr>
    <td class="col-md-6">
      {!! Form::label('password', 'パスワード:') !!}
    </td>
    <td>
      {!! Form::text('password', null, ['class' => 'form-control']) !!}
    </td>
  </tr>
</tbody>
</table>
<br>
  <div class="col-md-offset-1">
          {!! Form::submit('ログイン', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
<h3><a href="#">新規登録はこちら</a></h3>
<h1>サイト説明</h1>
<h2>内容</h2>
<h2>デバッグ用最終的に消す</h2>
<li>
<ul>
  <a href="/ShiftManager/public/profile_view">プロフイール閲覧</a>
</ul>
</li>
</div>
@endsection
