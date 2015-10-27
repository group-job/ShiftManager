<div id="group-tab" class="tab-content">

{{-- タブのインクルード先を指定 --}}
  @foreach($tabArray as $key => $value)
  <div class="tab-pane fade in active" id="{{ $value }}">
    @include('group.'.$value)
  </div>
  @endforeach


</div>
