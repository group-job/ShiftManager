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
@include('personal.part-personal-calendar')
@endsection
@section('contents-space')
{{-- メッセージ --}}
@if (Session::has('errorMessage'))
  <script type="text/javascript">
    alertify.error("{!!Session::get('errorMessage')!!}");
  </script>
@endif
<div id="personal-space">
{{-- カレンダー --}}
  <div id='calendar'>
  {{-- カレンダーイベントの凡例 --}}
    <div class="col-md-offset-2">
      <ul id="explanatory-notes">
        <li><div class="circle" id="circle0"></div>希望</li>
        <li><div class="circle" id="circle1"></div>仮確定</li>
        <li><div class="circle" id="circle2"></div>確定</li>
        <li><div class="circle" id="circle3"><span class="circle-text">赤文字</span></div>削除依頼中</li>
      </ul>
    </div>
  </div>
</div>
{{-- 削除依頼ボタンのフォーム --}}
<form action="/personal/request-delete" id="form-request-delete" class="form-horizontal" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="shift_id" id="input-request-delete-shift-id">
  <button type="button"class="btn btn-calendar btn-danger togglable" id="button-request-delete" style="position:absolute; z-index:1;">削除依頼</button>
</form>
{{-- 仮シフト承認/拒否ボタンのフォーム --}}
<form action="/personal/reply" id="form-reply" class="form-horizontal" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="shift_id" id="input-reply-shift-id">
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
    <input type="hidden" name="shift-status" id="input-status-edit-shift">
    <table>
      <tr>
        <td>勤務先:</td>
        <td>
          <span id="input-group-name-edit-shift"></span>
        </td>
      </tr>
      <tr>
        <td>日付:</td>
        <td><input type="date" id="input-date-edit-shift" name="date" required min="2015-01-01" max="2030-12-31"></td>
      </tr>
      <tr>
        <td>開始時間</td>
        {{-- TODO デザイン変更--}}
        <td><input type="time" name="start_time"  id="input-start-time-edit-shift" required step="1800"></td>
      </tr>
      <tr>
        <td>終了時間</td>
        {{-- TODO デザイン変更--}}
        <td><input type="time" name="end_time" id="input-end-time-edit-shift" step="1800"></td>
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

{{-- マイシフト追加/グループシフト希望申請フォーム --}}
<div id="div-add-shift" class="togglable">
  <form id="form-add-shift" action = "/personal/add-shift" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="input-status-add-shift" name="status" >
    <table>
      <tr>
        <td>勤務先:</td>
        <td>
          <select id="input-group-add-shift" name="group_id">
            @if(isset($manage_groups))
              @foreach($manage_groups as $key => $value)
              <option class="option-managing-group-add-shift" value="{{$value->id}}">{{$value->group_name}}</option>
              @endforeach
            @endif
            @if(isset($join_groups))
              @foreach($join_groups as $key => $value)
              <option class="option-joining-group-add-shift" value="{{$value->id}}">{{$value->group_name}}</option>
              @endforeach
            @endif
          </select>
        </td>
      </tr>
      <tr>
        <td>日付:</td>
        <td><input type="date" id="input-date-add-shift" name="date" required min="2015-01-01" max="2030-12-31"></td>
      </tr>
      <tr>
        <td>開始時間</td>
        {{-- TODO デザイン変更--}}
        <td><input type="time" name="start_time"  id="input-start-time-add-shift" required></td>
      </tr>
      <tr>
        <td>終了時間</td>
        {{-- TODO デザイン変更--}}
        <td><input type="time" name="end_time" id="input-end-time-add-shift" ></td>
      </tr>
      <tr>
        <td>備考</td>
        <td><input type="text" name="note" id="input-note-add-shift" ></td>
      </tr>
    </table>
    <button type="button" id="btn-add-add-shift" class="btn btn-calendar btn-success col-md-offset-5 col-md-3">追加</button>
  </form>
</div>
@stop
