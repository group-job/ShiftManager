// 指定したidのフォームをPOSTで送信するメソッド
// Button type="button" onclick=postAcync(クリックされたボタン,flg)で呼び出す
// 利用例はpart-create-calendar.blade.php:83 参照
//button : クリックされたボタン
//flg = true  で通信終了時にフォームを非表示。 false で通信中のくるくる
function postAcync(button,flg){
  //クリックされたボタンの先祖の直近のフォームを取得
  var $form = $(button).closest("form");
  $.ajax({
    url: $form.attr('action'),
    type: $form.attr('method'),
    data: $form.serialize(),
    // beforeSend: function(xhr) {
    // },
  })
  .done(function() {
    //非同期通信成功
  })
  .fail(function() {
    //非同期通信失敗
  })
  .always(function() {
    // フォームを非表示に
    if (flg == true){
      // $form.css("visibility","hidden");//フォームごと非表示に
      $('.togglable').hide();
    }else {
      var btn =$form.find('button');
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
