// postAcync()
// 指定したidのフォームをPOSTで送信するメソッド
// Button type="button" onclick=postAcync(クリックされたフォーム,flg)で呼び出す
// 利用例はpart-create-calendar.blade.php:143 参照
// @param form  送信するフォーム
// @param flg  trueで通信終了時にフォームを非表示。 false で通信中のくるくる
function postAcync(form,flg){
  $.ajax({
    url: form.attr('action'),
    type: form.attr('method'),
    data: form.serialize(),
    // beforeSend: function(xhr) {
    // },
  })
  .done(function(result) {
    //非同期通信成功
    //通信先メソッドのリターンをそのまま返却
    return result;
  })
  .fail(function(result) {
    //非同期通信失敗
  })
  .always(function(result) {
    // フォームを非表示に
    if (flg == true){
      // form.css("visibility","hidden");//フォームごと非表示に
      $('.togglable').hide();
    }else {
      var btn =form.find('button');
      btn.button('loading');
      setTimeout(function () {
        btn.button('reset');
      }, 400);
    }
  });
}
$(document).ready(function() {
  $('.togglable').hide();
});
