<h1>グループ名</h1>
<ul class="nav nav-tabs">
  {{-- タブを定数でループ --}}
  @foreach($tabArray as $key => $value)
    <li
    @if( $key == HOME_OWNER )
      class="active"
    @endif
    >
    <a href="{{ $value }}" data-toggle="tab">{{ $key }}</a></li>
  @endforeach
</ul>
