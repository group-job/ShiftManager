/**
 * チャット登録コントローラ呼び出し
 * @param  {[type]} category [description]
 * @return {[type]}          [description]
 */
function store(button){
  $.post(
    "store-chat",
    {
      '_token': $('meta[name=csrf-token]').attr('content'),
      'text': document.getElementById("chat-text").value,
      'id': groupId,
      'category': 1,
    },
    function (data) {
    });
    document.getElementById("chat-text").value = '';
    show();
}

function check(button){
  alert(button.id);
  $.post(
    "check-infomation",
    {
      '_token': $('meta[name=csrf-token]').attr('content'),
      'chatId': button.id,
    },
    function (data) {
    });
    show();
}

$(function(){
  /**
   * 表示間隔秒 1000 = 1秒
   * @type {Number}
   */
  var intervalTime = 10000;
  /**
   * チャット取得し表示
   * @return {[type]} [description]
   */
  function show(){
    $.post(
      "show-chat",
      {
        '_token': $('meta[name=csrf-token]').attr('content'),
        'id': groupId,
        'category': 1,
      },
      function (data) {
        if(data != null){
        var chatLog ="";
        for (var i = 0; i < data.length; i++) {
          if (i == 0) {
            chatLog += "<div class='text-center'>"+data[i + 1]["date"]+"</div>";
          }
          chatLog += data[i]["time"]+"に"+data[i]["name"]+"が"+data[i]["text"]+"って言ってる";
          // TODO: 連絡ボード用のボタンを追加　idを指定し、同じ関数からnameの値を参照できる関数を探す。
          chatLog += "<input type='button' class='btn btn-primary' value='確認' id ="+ data[i]["id"] +" onclick = 'check(this)'>";
          if (i != data.length - 1) {
            if(data[i]["date"] != data[i + 1]["date"]){
              chatLog += "<div class='text-center'>"+data[i + 1]["date"]+"</div>";
            }
          }
        }
        }
      $('#show-chat').html(chatLog);
      });

  }

  /**
   * 指定行ごとにshow()呼び出し
   * @param {[type]} function( [description]
   */
  setInterval(function(){
  show();
},intervalTime);
  show();

});

//# sourceMappingURL=chat.js.map

//# sourceMappingURL=infomation.js.map
