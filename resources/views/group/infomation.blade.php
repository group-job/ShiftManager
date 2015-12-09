{{-- <br>
<div class="row col-lg-offset-2">
  <div class="container">
    <div class="alert-info col-lg-7">
      社長が辞めました。
    </div>
      <div class="col-lg-5">
        <input type="button" name="name" value="確認" class="btn-success btn">
      </div>
  </div>
</div> --}}

@extends('group.home')

@section('tab-space')
<script>
  var groupId = {{ $groupId }};
</script>
<script type="text/javascript" src="/js/infomation.js"></script>
  <br>
  <div id="show-chat"></div>
  {!! Form::text('chat_text', null, ['class' => 'form-control', 'id' => 'chat-text'  ]) !!}
  {{-- <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-2" idata-loading-text="送信中" value="送信" id = 'post-infomation'> --}}
  <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-2" idata-loading-text="送信中" value="送信" onclick="store()">

@endsection
