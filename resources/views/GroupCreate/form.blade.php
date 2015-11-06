
  {!! Form::open( ['url' => 'group/create'] ) !!}
  <table>
    <tr>
      <td>
        {!! Form::label('name', 'グループ名：') !!}
      </td>
      <td>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
      </td>
    </tr>
    <tr>
      <td colspan="2">
        {!! Form::submit('作成', ['class' => 'btn btn-primary form-control']) !!}
      </td>
    </tr>
  </table>

  {{ $member_group }}
