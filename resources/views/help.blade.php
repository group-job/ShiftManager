<!-- レイアウトの継承 -->
@extends('common.layout')
<!--<link rel="stylesheets" type="text/scss" href="resources/assets/sass/home.scss">-->
@section('title')
ヘルプ
@stop
<!-- サイドメニューを消したい時にかく -->
@section('side_menu')
@overwrite
<!-- ここまで -->

<!-- この中身にかく -->
@section('main-contents')

<style type="text/css">
    ul.help li ul {
    margin: 0 0 0 1em;
    padding: 0;
    }
</style>


<h1>ヘルプ</h1>

<div>
    <ul class="help">
        <li><a href="#smoothplay1">このサイトについて</a></li>
        <li>使い方
            <ul>
                <li><a href="#smoothplay2">アカウント</a></li>
                <li><a href="#smoothplay3">グループ作成</a></li>
                <li><a href="#smoothplay4">グループ招待</a></li>
                <li><a href="#smoothplay5">オーナー機能</a></li>
                <li><a href="#smoothplay6">メンバー機能</a></li>
                <li><a href="#smoothplay7">給与</a></li>
                <li><a href="#smoothplay8">チャット</a></li>
                <li><a href="#smoothplay9">連絡ボード</a></li>
                <li><a href="#smoothplay10">お知らせ</a></li>
            </ul>
        </li>
        <li><a href="#smoothplay11">メールアドレス、パスワードを忘れた方。</a></li>
        <li><a href="#smoothplay12">お問合せ</a></li>
    </ul>
</div><br>

<div id="smoothplay1">
    <strong>このサイトについて</strong><br>
    このサイトは、シフトの管理者と利用者が簡単にシフトの管理、共有が行えるサイトです。<br>
    このサイトの特徴として、メンバーが自由に機能を利用するのではなく、シフトの管理者を通してシフトを管理するところです。
    ぜひご利用ください。<br><br>
</div>

<div id="smoothplay2">
    <strong>アカウント</strong><br>
    このサイトを利用するには、アカウントを作成する必要があります。アカウント作成後、アカウント編集画面で、
    アカウント内容の変更や、好きな画像を設定することができます。なお、一度アカウントを作成すると退会することはできません。<br><br>
</div>

<div id="smoothplay3">
    <strong>グループ作成</strong><br>
    グループの作成が行えます。作成した方がグループ管理者になります。グループ管理者は、グループ設定で変更できます。<br><br>
</div>

<div id="smoothplay4">
    <strong>グループ招待</strong><br>
    グループ管理者が管理しているグループに、メンバーを招待できます。<br><br>
</div>

<div id="smoothplay5">
    <strong>オーナー機能</strong><br>
    オーナーがグループを管理します。シフトの閲覧、依頼、承認などができます。<br><br>
</div>

<div id="smoothplay6">
    <strong>メンバー機能</strong><br>
    シフトの閲覧、希望、承認などができます。<br><br>
</div>

<div id="smoothplay7">
    <strong>給与</strong><br>
    給料の簡単な計算ができます。時給や、日当、月給などを知れます。<br><br>
</div>

<div id="smoothplay8">
    <strong>チャット</strong><br>
    参加しているグループ内でのチャットが行えます。アルバイト内容の話し合いなどにご利用ください。<br><br>
</div>

<div id="smoothplay9">
    <strong>連絡ボード</strong><br>
    チャット機能に加え、メッセージの既読機能を使用できます。重要な連絡にご利用ください。<br><br>
</div>

<div id="smoothplay10">
    <strong>お知らせ</strong><br>
    システムからのお知らせが届きます。<br><br>
</div>

<div id="smoothplay11">
    <strong>メールアドレス、パスワードを忘れた方。</strong><br>
    当サイトでは、パスワード再発行などは、行っておりません。ご了承ください。<br><br>
</div>

<div id="smoothplay12">
    <strong>お問合せ</strong><br>
    当サイトでは、お問合せは行っておりません。ご了承ください。<br><br>
</div>

@endsection
<!-- ここまで -->
