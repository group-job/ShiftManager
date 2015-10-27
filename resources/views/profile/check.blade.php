<!-- レイアウトの継承 -->
@extends('common.layout')

<!-- サイドメニューを消したい時にかく -->
@section('side_menu')
@overwrite
<!-- ここまで -->

<!-- この中身にかく -->
@section('main-contents')

<table>
<tbody>
  <tr>
    <td colspan="2">
      <h1>変更後の情報確認</h1>
    </td>
  </tr>
{{-- 氏名 --}}
  <tr>
    <td class="col-md-6">
      新しい名前：
    </td>
    <td>
      新しいきみや
    </td>
  </tr>
{{-- 電話番号 --}}
  <tr>
    <td class="col-md-6">
      新しい電話番号:
    </td>
    <td>
      090-1234-1234
    </td>
  </tr>
{{-- メールアドレス --}}
<tr>
  <td class="col-md-6">
    新しいメールアドレス
  </td>
  <td>
    new-kimiya@kimiya.jp
  </td>
</tr>
{{-- 再入力 --}}
<tr>
  <td class="col-md-6">
    新しいメールアドレス(再入力):
  </td>
  <td>
    new-kimiya@kimiya.jp
  </td>
</tr>

{{-- 画像 --}}
<tr>
  <td class="col-md-6">
    画像:
  </td>
  <td>
    {{-- {!! Form::text('image', null, ['class' => 'form-control']) !!} --}}
    ここに画像
  </td>
</tr>

</tbody>
</table>

<div class="col-md-offset-1">
  <button type="button" class="btn btn-default" onclick="history.back();">
    入力画面に戻る
  </button>
  <button type="button" class="btn btn-default" onclick="location.href='http://localhost:8888/profile.commit'">
    完了
  </button>
        {{-- {!! Form::submit('キャンセル', ['class' => 'btn btn-primary']) !!} --}}
        {{-- {!! Form::submit('確認', ['class' => 'btn btn-primary']) !!} --}}
{!! Form::close() !!}

@endsection
<!-- ここまで -->
