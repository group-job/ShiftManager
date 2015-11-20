<?php
const VIEW = "給与一覧";
const VIEW_URL = "view";
const MANAGER = "給与管理";
const MANAGER_URL = "manager";
const kind = "salary";

const SALARY_KBN = "給与区分";
const SALARY_MONEY = "給与金額";
const START_DAY = "開始年月日";
const END_DAY = "終了年月日";
$salaryArray= array(SALARY_KBN,SALARY_MONEY,START_DAY,END_DAY);


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
