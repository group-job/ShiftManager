
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
    {!! Form::close() !!}
    {{-- {{ var_dump($member_group) }} --}}
    {{ $join_group_id }}
        {{-- {{ $member_group['group_id'] }} --}}
        {{-- {{ $member_group['user_id'] }} --}}
        {{-- {{var_dump($member_group)}} --}}
        {{-- {{var_dump($member_group_id)}} --}}
        {{-- @foreach($member_group as $value)
          グループ：{{ $value['name'] }}<br>
        @endforeach --}}
