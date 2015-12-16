@extends('group.home')

@section('modify-js')
  @parent
  <style>
  .chat-hukidashi {
  display: inline-block; /*コメントの文字数に合わせて可変*/
  padding: 5px 5px;
  /*margin-left: 120px;*/
  /*margin-top: 10px;*/
  border: 1px solid gray;
  border-radius: 10px;
  background-color: #D9F0FF;
}
.chat-date {
display: inline-block; /*コメントの文字数に合わせて可変*/
padding: 5px 5px;
/*margin-left: 120px;*/
/*margin-top: 10px;*/
border: 1px solid gray;
border-radius: 10px;
background-color: #BCF5A9;
}
  </style>
@endsection

@section('tab-space')
<script>
  var groupId = {{ $group->id }};
  $(document).ready(function() {
    $("#information-tab").addClass("selected");
  });
</script>
<script type="text/javascript" src="/js/infomation.js"></script>
  <br>
  <div id="show-chat" style='overflow: scroll;height: 370px; width: 800px;' class="col-lg-offset-2"></div>
  <div class="col-lg-6 col-lg-offset-3 row">
  {!! Form::text('chat_text', null, ['class' => 'form-control', 'id' => 'chat-text'  ]) !!}
  {{-- <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-2" idata-loading-text="送信中" value="送信" id = 'post-infomation'> --}}
  {{-- _<input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-2" idata-loading-text="送信中" value="送信" onclick="store()"> --}}
  <span style="padding-top: 20px;"><input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-10" idata-loading-text="送信中" value="送信" onclick="store()" >
  {{-- <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-10" idata-loading-text="送信中" value="送信" onclick="store()" > --}}
</div>

@endsection
