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
      // $form.hide(); これフォームごと消えるから、2回め以降ボタンとか使えなくなる
      $form.find('button').hide();
      $form.find('input').hide();
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
  // $("td").not('.fc-day').css('background-color','#5c0a95');
});
