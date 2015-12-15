jQuery(document).ready(function () {
  //名前変更処理
  $("#button-name").click(function (event) {
    $.post(
      "store",
      {
        '_token': $('meta[name=csrf-token]').attr('content'),
        'name': document.getElementById("input-name").value,
      },
      function (data) {
        // $('#alert').html("氏名を" + data + "に変更しました");
        // $('#nowname').html(data);
        // $('#sessionName').html(data);
      }
  );
  document.getElementById("input-name").value = '';
  });


  //メールアドレス変更処理
  $("#button-email").click(function (event) {
    console.log('kimiya');
    $.post(
      "store",
      {
        '_token': $('meta[newemail=csrf-token]').attr('content'),
        'email': document.getElementById("input-email").value,
      },
      function (data) {
      });
  if(document.getElementById("input-email").value != document.getElementById("input-email2").value){
      alert("新しいメールアドレスの入力が正しくありません");
  }else{
      document.getElementById("input-email").value ='';
      document.getElementById("input-email2").value ='';
  }
  });

  //パスワード変更処理
  $("#button-password").click(function (event) {
    $.post(
      "store",
      {
        '_token': $('meta[newpassword=csrf-token]').attr('content'),
        'password': document.getElementById("input-new-password").value,
      },
      function (data) {
        // $('#alert').html("氏名を" + data + "に変更しました");
        // $('#nowname').html(data);
        // $('#sessionName').html(data);
      }
  );
  });

  // // 画像変更処理
  // $("#button-image").click(function (event) {
  //   $.post(
  //     "store",
  //     {
  //       '_token': $('meta[image=csrf-token]').attr('content'),
  //       type: "image",
  //       value: document.getElementById("input-image").value,
  //     },
  //     function (data) {
  //       // $('#alert').html("氏名を" + data + "に変更しました");
  //       // $('#nowname').html(data);
  //       // $('#sessionName').html(data);
  //     }
  // );
  // });

  // ローディングボタン
  $("input:button").click(function () {
    var btn = $(this);
    btn.button('loading');
    setTimeout(function () {
      btn.button('reset');
    }, 400);
  });
});

//# sourceMappingURL=profile.js.map

//# sourceMappingURL=profile.js.map
