@extends('group.home')
@section('title')
グループシフト
{{-- <link href='/css/scheduler.css' rel='stylesheet' /> --}}
@endsection
@section('modify-js')
@parent
@include('group.part-manager-calendar')
@include('group.part-manager-scheduler')
<script type="text/javascript">
$(document).ready(function() {
  $("#shift-tab").addClass("selected");
});
</script>
@endsection
@section('tab-space')
  <div class="row" >
    <div class="col-md-3">
      <div id='manager-calendar'></div>
    </div>
    <div class="col-md-9">
      <div id="manager-scheduler"></div>
    </div>
  </div>
  {{-- 申請承認/拒否フォーム --}}
  <form action="/group/add-approval" id="form-add-approval" class="form-horizontal" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="shift-id" id="input-add-approval-shift-id">
    {{-- input-add-approval-status→承認:value=2, 拒否:value=4 --}}
    <input type="hidden" name="shift-status" id="input-add-approval-status">
    <button type="button"class="btn btn-calendar btn-danger togglable" id="button-add-approval-deny" style="position:absolute; z-index:1;">拒否</button>
    <button type="button"class="btn btn-calendar btn-success togglable" id="button-add-approval-approve" style="position:absolute; z-index:1;">承認</button>
  </form>
  {{-- 削除依頼承認/拒否フォーム --}}
  <form action="/group/delete-approval" id="form-delete-approval" class="form-horizontal" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="shift-id" id="input-delete-approval-shift-id">
    {{-- input-delete-approval-status→承認:value=2, 拒否:value=4 --}}
    <input type="hidden" name="shift-status" id="input-delete-approval-status">
    <button type="button"class="btn btn-calendar btn-danger togglable" id="button-delete-approval-deny" style="position:absolute; z-index:1;">拒否</button>
    <button type="button"class="btn btn-calendar btn-success togglable" id="button-delete-approval-approve" style="position:absolute; z-index:1;">承認</button>
  </form>
  {{-- 削除ボタンフォーム --}}
  <form action="/group/delete-shift" id="form-delete-shift" class="form-horizontal" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="shift-id" id="input-shift-id-delete-shift">
  <button type="button"class="btn btn-calendar btn-danger togglable" id="button-delete-delete-shift" style="position:absolute; z-index:1;">削除</button>
</form>
  {{-- 仮シフト･確定シフト編集フォーム --}}
  <div id="div-edit-shift" class="togglable">
    <form action="/group/edit-shift" id="form-edit-shift" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" id="input-shift-id-edit-shift" name="shift-id">
      <input type="hidden" name="shift-status" id="input-status-edit-shift">
      <table>
        <tr>
          <td>名前:</td>
          <td>
            <span id="input-name-edit-shift"></span>
            {{-- ユーザー変更はめんどくさいからやっぱあとから --}}
            {{-- <select id="input-name-edit-shift" name="name">
              @if(isset($users))
              aaaa
              @foreach($users as $value)
              <option value="{{$value->id}}">{{$value->name}}</option>
              @endforeach
            @endif
          </select> --}}
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
  {{-- 仮シフト作成フォーム --}}
  <div id="div-add-shift" class="togglable">
    <form id="form-add-shift" action = "/group/{{$group->id}}/add-shift" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <table>
        <tr>
          <td>名前:</td>
          <td>
            <span id="input-name-edit-shift"></span>
            <input id="input-user-id-add-shift" type="hidden" name="user_id">
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
@endsection
