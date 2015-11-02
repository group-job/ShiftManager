<!-- レイアウトの継承 -->
@extends('common.layout')


<!-- この中身にかく -->
@section('main-contents')
<div class="row col-lg-offset-2">
  <div class="container col-lg-offset-1">
      <h1>新規グループの作成</h1>
  </div>
  @if (Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif
  <br>
<div class="container">
  {!! Form::open( ['url' => 'group/store'] ) !!}
  <table>
    <tr>
      <td>
        {!! Form::label('group_name', 'グループ名：') !!}
      </td>
      <td>
        {!! Form::text('group_name', null, ['class' => 'form-control']) !!}
      </td>
    </tr>
    <tr>
      <td colspan="2">
        {!! Form::submit('作成', ['class' => 'btn btn-primary form-control']) !!}
      </td>
    </tr>
  </table>

    {{--
        <div class="form-group">


        </div>
        <div class="form-group">

        </div> --}}
    {!! Form::close() !!}

</div>
@endsection
<!-- ここまで -->
