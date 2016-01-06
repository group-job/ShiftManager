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
      'category': 1,
    },
    function (data) {
      if(data != null){
      var chatLog ="<div class='row col-lg-offset-1 col-lg-10'>";
      for (var i = 0; i < data.length; i++) {
        if (i == 0) {
          chatLog += "<div class='text-center chat-date col-lg-offset-3' style='margin-top: 10px;margin-bottom: 10px;'>"+data[i]["date"]+"</div><br>";
        }

        chatLog += "<div class='col-lg-10' style='margin-top: 5px;'><span class = 'col-lg-2'>"+
                    data[i]["time"]+"</span><span class = 'col-lg-3'>"
                    +data[i]["name"]+
                    "</span><span class = 'chat-hukidashi'>"+data[i]["text"]+"</span>";
        if (data[i]["check"]) {
          chatLog += "<input type='button' class='btn btn-primary' value='確認' id ="+ data[i]["id"] +" onclick = 'check(this)'>";
        }else{
          chatLog += "<input type='button' class='btn disabled' value='確認' id ="+ data[i]["id"] +"disabled>";
          // for (var j = 0; j < data[i]["check"].length; j++) {
            // chatLog += "<input type='button' class='btn btn-primary' value='確認した人表示' id ="+ data[i]["check"][j].user_id +" onclick = 'checkPerson(this)'>";
            // chatLog += data[i]["check"][j].user_id;
          // }

        }
        if(data[i]["checkPerson"] != null){
            chatLog += "確認済みリスト："+data[i]["checkPerson"] +"</div>";
        }else{
          chatLog += "</div>";
        }


        if (i != data.length - 1) {
          if(data[i]["date"] != data[i + 1]["date"]){
            chatLog += "<div class='text-center chat-date col-lg-offset-3' style='margin-top: 10px;margin-bottom: 10px;'>"+data[i + 1]["date"]+"</div><br>";
          }
        }
      }
      }
    $('#show-chat').html(chatLog);
    });

}


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
  show();
  /**
   * 指定行ごとにshow()呼び出し
   * @param {[type]} function( [description]
   */
  setInterval(function(){
  show();
},intervalTime);

});

//# sourceMappingURL=infomation.js.map

//# sourceMappingURL=infomation.js.map

//# sourceMappingURL=infomation.js.map
