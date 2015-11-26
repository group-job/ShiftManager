@extends('Group.home')

@section('contents-space')
<br>
<script>
  $(function(){
    var intervalTime = 1000;
    var groupId = {{ $groupId }};
    function showChat(){
      $.post(
        "show-chat",
        {
          '_token': $('meta[name=csrf-token]').attr('content'),
          'id' : groupId,
        },
        function (data) {
          var chatLog ="";
          for (var i = 0; i < data.length; i++) {
            chatLog += data[i]["name"]+"が"+data[i]["text"]+"って言ってる<br>";
          }
        $('#show-chat').html(chatLog);
        });
    }

    showChat();
    setInterval(function(){
      showChat();
    },intervalTime);
    $("#button-send-chat").click(function (event) {
      $.post(
        "store-chat",
        {
          '_token': $('meta[name=csrf-token]').attr('content'),
          text: document.getElementById("chat-text").value,
          'id' : groupId,
        },
        function (data) {
        });
        document.getElementById("chat-text").value = '';
    });
  });
</script>
<div class="row col-lg-offset-3">
  <div id="show-chat" class="col-lg-6"></div>
  {!! Form::text('chat_text', null, ['class' => 'form-control', 'id' => 'chat-text'  ]) !!}
  <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-2" id="button-send-chat" data-loading-text="送信中" value="送信">
</div>

@endsection
