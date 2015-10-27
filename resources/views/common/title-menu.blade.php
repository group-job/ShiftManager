<div class="row">


<ul class="nav nav-tabs">
  {{-- タブを定数でループ --}}
  @foreach($tabArray as $key => $value)
    <li
    @if( $value == reset($tabArray) )
      class="active"
    @endif
    ><a href="#{{ $value }}" data-toggle="tab">{{ $key }}</a></li>
  @endforeach
</ul>
</div>
