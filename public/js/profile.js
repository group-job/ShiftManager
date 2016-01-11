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
    if(document.getElementById("input-email").value != document.getElementById("input-email2").value){
        alert("新しいメールアドレスの入力が正しくありません");
    }else{
    $.post(
      "store",
      {
        '_token': $('meta[name=csrf-token]').attr('content'),
        'email': document.getElementById("input-email").value,
      },
      function (data) {
      });
      document.getElementById("input-email").value ='';
      document.getElementById("input-email2").value ='';
    }
  });

  //パスワード変更処理
  $("#button-password").click(function (event) {
    var updateflg = true;
    if(document.getElementById("input-now-password").value.length == 0 || document.getElementById("input-new-password").value.length == 0 || document.getElementById("input-new-password2").value.length == 0){
      updateflg = false;
    }else{
      // if(document.getElementById("input-now-password").value != {{ $user->password }}){
      //   updateflg = false;
      // }
      if(document.getElementById("input-new-password").value != document.getElementById("input-new-password2").value){
        updateflg = false;
      }
    }
    if(updateflg == false){
        alert("入力内容が正しくありません");
    }else{
    $.post(
      "store",
      {
        '_token': $('meta[name=csrf-token]').attr('content'),
        'password': document.getElementById("input-new-password").value,
        'oldpassword': document.getElementById("input-now-password").value,
      },
      function (data) {
      document.getElementById("input-now-password").value ='';
      document.getElementById("input-new-password").value ='';
      document.getElementById("input-new-password2").value ='';
      });
    }
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
