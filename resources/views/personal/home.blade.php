{{--
個人ホーム
@param groups
--}}

@extends('common.layout')
@section('title')
ホーム
@stop
@section('modify-js')
@parent
@include('personal.part-create-calendar')
@endsection
@section('title-space')
<div class="col-md-offset-4 col-md-4"><h1>マイシフト</h1></div>
@stop
@section('contents-space')
{{-- カレンダーにイベントを追加するためのスクリプト --}}
<div id='calendar'></div>
{{-- カレンダーイベントの凡例 --}}
<div class="col-md-offset-3">
  <ul id="explanatory-notes">
    <li><div class="circle" id="circle0"></div>希望</li>
    <li><div class="circle" id="circle1"></div>仮確定</li>
    <li><div class="circle" id="circle2"></div>確定</li>
    <li><div class="circle" id="circle3"><span class="circle-text">赤文字</span></div>削除依頼中</li>
  </ul>
</div>
{{-- 削除依頼ボタンのフォーム --}}
<form action="/personal/request-delete" id="form-request-delete" class="form-horizontal" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="shift-id" id="input-request-delete-shift-id">
  <button type="button"class="btn btn-calendar btn-danger togglable" id="button-request-delete" style="position:absolute; z-index:1;">削除依頼</button>
</form>
{{-- 仮シフト承認/拒否ボタンのフォーム --}}
<form action="/personal/reply" id="form-reply" class="form-horizontal" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="shift-id" id="input-reply-shift-id">
  {{-- input-reply-status→承認:value=2, 拒否:value=4 --}}
  <input type="hidden" name="shift-status" id="input-reply-status">
  <button type="button"class="btn btn-calendar btn-danger togglable" id="button-reply-deny" style="position:absolute; z-index:1;">拒否</button>
  <button type="button"class="btn btn-calendar btn-success togglable" id="button-reply-approve" style="position:absolute; z-index:1;">承認</button>
</form>
<br/>
{{-- マイシフト編集フォーム --}}
<div id="div-edit-shift" class="togglable">
  <form action="/personal/edit-shift" id="form-edit-shift" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="input-shift-id-edit-shift" name="shift_id">
    <table>
      <tr>
        <td>勤務先:</td>
        <td>
          <span id="input-group-name-edit-shift"></span>
        </td>
      </tr>
      <tr>
        <td>日付:</td>
        <td><input type="date" id="input-date-edit-shift" name="date" required></td>
      </tr>
      <tr>
        <td>開始時間</td>
        {{-- TODO デザイン変更--}}
        <td><input type="time" name="start_time"  id="input-start-time-edit-shift" required></td>
      </tr>
      <tr>
        <td>終了時間</td>
        {{-- TODO デザイン変更--}}
        <td><input type="time" name="end_time" id="input-end-time-edit-shift" ></td>
      </tr>
      <tr>
        <td>備考</td>
        <td><input type="text" name="note" id="input-note-edit-shift" ></td>
      </tr>
    </table>
    <button type="button" id="btn-update-edit-shift" class="btn btn-calendar btn-success col-md-offset-2 col-md-3">変更</button>
    <button type="button" id="btn-delete-edit-shift" class="btn btn-calendar btn-danger col-md-offset-2 col-md-3">削除</button>
  </form>
</div>

{{-- マイシフト追加フォーム --}}
<div id="div-edit-shift" class="togglable">
  <form action="/personal/edit-shift" id="form-edit-shift" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="input-shift-id-edit-shift" name="shift_id">
    <table>
      <tr>
        <td>勤務先:</td>
        <td>
          <span id="input-group-name-edit-shift"></span>
        </td>
      </tr>
      <tr>
        <td>日付:</td>
        <td><input type="date" id="input-date-edit-shift" name="date" required></td>
      </tr>
      <tr>
        <td>開始時間</td>
        {{-- TODO デザイン変更--}}
        <td><input type="time" name="start_time"  id="input-start-time-edit-shift" required></td>
      </tr>
      <tr>
        <td>終了時間</td>
        {{-- TODO デザイン変更--}}
        <td><input type="time" name="end_time" id="input-end-time-edit-shift" ></td>
      </tr>
      <tr>
        <td>備考</td>
        <td><input type="text" name="note" id="input-note-edit-shift" ></td>
      </tr>
    </table>
    <button type="button" id="btn-update-edit-shift" class="btn btn-calendar btn-success col-md-offset-2 col-md-3">変更</button>
    <button type="button" id="btn-delete-edit-shift" class="btn btn-calendar btn-danger col-md-offset-2 col-md-3">削除</button>
  </form>
</div>
{{-- テスト用フォーム --}}
<form action="/personal/reply" id="test-form" class="form-horizontal" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="shift-id" value="4">
  <input type="hidden" name="shift-status" value="2">
  <button type="submit" class="btn btn-danger event-detail-tooltip"  title="This is my div's tooltip message!" style="position:absolute; z-index:1; ">test</button>
</form>

@stop
