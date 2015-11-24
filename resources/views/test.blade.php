<!-- レイアウトの継承 -->
@extends('common.layout')

<!-- サイドメニューを消したい時にかく -->
@section('side_menu')
@overwrite
<!-- ここまで -->

<!-- この中身にかく -->
@section('main-contents')
<div class="test-a">
  a
  <div class="test-a1">
    a1
  </div>
  <div class="test-a2">
    <p>
      a2
    </p>
    <div class="test-a2a">
      <p>
        a2a
      </p>
    </div>
    a2
  </div>
  a
</div>

@endsection
<!-- ここまで -->
