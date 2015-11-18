  // 指定したidのフォームをPOSTで送信するメソッド
  // Button type="button" onclick=postAcync('formのid')で呼び出す
  
//flg = true  で通信終了時にフォームを消す。 false で通信中のくるくる
function postAcync(id,flg){
  var $form = $('#'+id);
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
      $form.hide();
    }else {
      var btn =$form.find('button');
      btn.button('loading');
      setTimeout(function () {
        btn.button('reset');
      }, 400);
    }
  });
}
