<!-- モーダル・ダイアログ -->
<div class="modal fade" id="login-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        <h4 class="modal-title">ログイン</h4>
      </div>
        {{-- フォーム --}}
        <form action="/auth/login" class="form-horizontal" method="post">
          <div class="modal-body">
          {{-- CSRF対策--}}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="input-mail" class="col-md-3 control-label">メールアドレス</label>
            <div class="col-md-6">
              <input type="text" class="form-control focus" name="mail" id="input-mail" placeholder="メールアドレス" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="input-passward" class="col-md-3 control-label text-left">パスワード</label>
            <div class="col-md-6">
              <input type="password" class="form-control" name="password" id="input-passward" placeholder="半角英数字6文字以上" required="required">
            </div>
          </div>
          <div class="text-danger text-center">
          </div>
          <div class="col-md-offset-8">
            会員登録は<a href="#" data-toggle="modal" data-target="#signup-modal" data-dismiss="modal">こちら</a>
          </div>
        </div>
          {{--End of フォーム --}}

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary">ログイン</button>
        </div>
      </form>
    </div>
  </div>
</div
  {{-- End of モーダル --}}

  <!-- モーダル・ダイアログ -->
<div class="modal fade" id="signup-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        <h4 class="modal-title">会員登録</h4>
      </div>
          {{-- フォーム --}}
        <form action="/auth/register" id="register" class="form-horizontal" method="post">
          <div class="modal-body">
          {{-- CSRF対策--}}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="input-name" class="col-md-3 control-label">名前</label>
            <div class="col-md-6">
              <input type="text" class="form-control focus" name="name" id="input-name" placeholder="" value="{{ old('name') }}" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="input-mail" class="col-md-3 control-label">メールアドレス</label>
            <div class="col-md-6">
              <input type="text" class="form-control focus" name="mail" id="input-mail" placeholder="aso12345@example.com" value="{{ old('name') }}" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="input-passward" class="col-md-3 control-label text-left">パスワード</label>
            <div class="col-md-6">
              <input type="password" class="form-control" name="password" id="input-passward" placeholder="半角英数字6文字以上" value="{{ old('name') }}" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="input-passward" class="col-md-3 control-label text-left">パスワード確認</label>
            <div class="col-md-6">
              <input type="password" class="form-control" name="con_password" id="input-passward" placeholder="半角英数字6文字以上" value="{{ old('name') }}" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="input-phone1" class="col-md-3 control-label text-left">電話番号</label>
            <div class="col-md-2">
              <input type="text" class="form-control" name="phone1" id="input-phone1" placeholder="080" value="{{ old('name') }}" required="required">
            </div>
            <label for="input-phone2" class="control-label col-md-1">-</label>
            <div class="col-md-2">
              <input type="text" class="form-control" name="phone2"id="input-phone1" placeholder="11234" value="{{ old('name') }}" required="required">
            </div>
            <label for="input-phone3" class="control-label col-md-1">-</label>
            <div class="col-md-2">
              <input type="text" class="form-control" name="phone3"id="input-phone3" placeholder="5678" value="{{ old('name') }}" required="required">
            </div>
          </div>
          <div class="text-danger text-center">
          </div>
          <div class="col-md-offset-8">
          </div>
        </div>
        <div class="col-md-offset-8">
          ログインは<a href="#" data-toggle="modal" data-target="#login-modal" data-dismiss="modal">こちら</a>
        </div>
        <div class="modal-footer">
            {{--End of フォーム --}}
        {{-- <div class="modal-footer"> --}}
          <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
          <button type="submit" class="btn btn-primary">登録</button>
        </div>
      </form>
    </div>
  </div>
</div

{{-- End of モーダル --}}
