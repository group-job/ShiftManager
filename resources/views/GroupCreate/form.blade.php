  {!! Form::open( ['url' => 'groupcreate/store'] ) !!}
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
  {!! Form::close() !!}
