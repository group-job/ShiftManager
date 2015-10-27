<?php
const VIEW = "給与一覧";
const VIEW_URL = "view";
const MANAGER = "給与管理";
const MANAGER_URL = "manager";
const kind = "salary";

$tabArray = array(VIEW => VIEW_URL,
                  MANAGER => MANAGER_URL,
                );
 ?>
<!-- レイアウトの継承 -->
@extends('common.layout')

{{-- タイトル部分の表示 --}}
@section('title-space')
@include('salary.title-name')
@endsection

@section('contents-space')
@include('common.tab-contents')
@endsection
