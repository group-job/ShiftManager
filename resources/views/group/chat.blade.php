@extends('group.home')

@section('modify-js')
  @parent
  <script>
    var groupId = {{ $group->id }};
  </script>
  <script type="text/javascript" src="/js/chat.js"></script>
@endsection

@section('tab-space')
  <br>
  <div id="show-chat"></div>
  <div class="col-lg-6 col-lg-offset-3 row">
  {!! Form::text('chat_text', null, ['class' => 'form-control', 'id' => 'chat-text'  ]) !!}
    <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-2" idata-loading-text="送信中" value="送信" onclick="store(this)">
  </div>
@endsection
