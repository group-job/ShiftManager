@extends('layout')

@section('content')
<table>
  <colgroup class="col-md-2"></colgroup>
  <colgroup class="col-md-2"></colgroup>
  <colgroup class="col-md-2"></colgroup>
<tbody>
  <h1>aaaaadfadsfsa</h1>
{!! Form::open() !!}
{{-- メールアドレス --}}
    <tr>
      <td colspan="2">
        {!! Form::label('mailaddress', 'メールアドレス:') !!}
      </td>
      <td>
        {!! Form::text('mailaddress', null, ['class' => 'form-control']) !!}
      </td>
    </tr>
{{-- パスワード --}}
    <tr>
      <td>
        {!! Form::label('password', 'パスワード:') !!}
      </td>
      <td>
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
      </td>
    </tr>
{!! Form::close() !!}
</tbody>
</table>
@endsection
