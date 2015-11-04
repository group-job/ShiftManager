<!-- モーダル・ダイアログ -->
<div class="modal fade" id="login-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        <h4 class="modal-title">ログイン</h4>
      </div>
      <div class="modal-body">

        {{-- フォーム --}}
        <form action="#" class="form-horizontal" method="post">
          <div class="form-group">
            <label for="input-mail" class="col-sm-3 control-label">メールアドレス</label>
            <div class="col-sm-6">
              <input type="text" class="form-control focus" name="mail" id="input-mail" placeholder="メールアドレス" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="input-passward" class="col-sm-3 control-label text-left">パスワード</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" name="password" id="input-passward" placeholder="半角英数字8文字以上" required="required">
            </div>
          </div>
          <div class="text-danger text-center">
            {{$message}}
          </div>
          <div class="col-md-offset-8">
            会員登録は<a href="#">こちら</a>
          </div>
        </form>
          {{--End of フォーム --}}

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
          <a type="button" class="btn btn-primary" href="/home.personal-home">ログイン</a>
        </div>
      </div>
    </div>
  </div
  {{-- End of モーダル --}}
