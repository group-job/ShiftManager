/**
 * チャット登録コントローラ呼び出し
 * @param  {[type]} category [description]
 * @return {[type]}          [description]
 */
function store(button){
  // alert(category);
  $.post(
    "store-chat",
    {
      '_token': $('meta[name=csrf-token]').attr('content'),
      'text': document.getElementById("chat-text").value,
      'id': groupId,
      'category': 0,
    },
    function (data) {
    });
    document.getElementById("chat-text").value = '';
}

$(function(){
  /**
   * 表示間隔秒 1000 = 1秒
   * @type {Number}
   */
  var intervalTime = 1000;
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
        'category': 0,
      },
      function (data) {
        var chatLog ="<div class='row col-lg-offset-1 col-lg-10' style=''>";
        for (var i = 0; i < data.length; i++) {
          if (i == 0) {
            chatLog += "<div class='text-center container col-lg-12'>"+data[i]["date"]+"</div><br>";
          }
          chatLog += "<div class='container col-lg-10 col-lg-offset-1' style='margin-top: 5px;'>"+
                      data[i]["time"]+"<span style='margin-right: 20px;'></span><span class='label-info'>"
                      +data[i]["name"]+
                      "</span><span style='margin-right: 20px;'></span><span class='label-success'>"+data[i]["text"]+"</span></div>";
          if (i != data.length - 1) {
            if(data[i]["date"] != data[i + 1]["date"]){
              chatLog += "<div class='text-center text-center row col-lg-12'>"+data[i + 1]["date"]+"</div>";
            }
          }
        }
        chatLog += "</div>";
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

});

//# sourceMappingURL=chat.js.map
