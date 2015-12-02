@extends('Group.home')

@section('tab-space')
<script>
  var groupId = {{ $groupId }};
</script>
<script type="text/javascript" src="/js/chat.js"></script>
  <br>
  <div id="show-chat"></div>
  {!! Form::text('chat_text', null, ['class' => 'form-control', 'id' => 'chat-text'  ]) !!}
  <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-2" idata-loading-text="送信中" value="送信" onclick="store(0)">
  <script>
    var groupId = {{ $groupId }};
  </script>
  <script type="text/javascript" src="/js/chat.js"></script>
@endsection
