<div id="group-tab" class="tab-content">

  {{-- タブのインクルード先を指定 --}}
  @foreach($tabArray as $key => $value)

  <div
  @if($value == reset($tabArray))
  class="tab-pane fade in active"
  @endif
  @if($value != reset($tabArray))
  class="tab-pane fade"
  @endif
  id="{{ $value }}">
  @include(kind.".".$value)
  </div>
@endforeach


</div>
