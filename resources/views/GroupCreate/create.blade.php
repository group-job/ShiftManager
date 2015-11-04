<!-- レイアウトの継承 -->
@extends('common.layout')

@section('main-contents')
<div class="row col-lg-offset-2">
  <div class="container col-lg-offset-1">
      <h1>新規グループの作成</h1>
  </div>
  {{ $manage_group }}
  {{-- フラッシュメッセージ --}}
  <div class="container">
    <div class="col-lg-6">
      @include('common.form-alert')
    </div>
  </div>
  <br>
  {{-- フォーム --}}
  <div class="container">
    @include('groupcreate.form')
  </div>
</div>
@endsection
