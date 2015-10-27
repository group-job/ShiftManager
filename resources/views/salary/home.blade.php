<!-- レイアウトの継承 -->
@extends('common.layout')

{{-- タイトル部分の表示 --}}
@section('title-space')
<h1>給与</h1>
<ul class="nav nav-tabs">
<li class="active"><a href="#tab1" data-toggle="tab">タブ1</a></li>
<li><a href="#tab2" data-toggle="tab">タブ2</a></li>
</ul>
<!-- / タブ-->
@endsection

@section('contents-space')
<div id="salary-tab" class="tab-content">
<div class="tab-pane fade in active" id="tab1">
      {{-- @include('salary.view') --}}
      @include('salary.view')
</div>
<div class="tab-pane fade" id="tab2">
    @include('salary.manager')
</div>
</div>
@endsection
