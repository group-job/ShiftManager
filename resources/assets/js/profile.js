jQuery(document).ready(function () {
  //名前変更処理
  $("#button-name").click(function (event) {
    $.post(
      "store",
      {
        '_token': $('meta[name=csrf-token]').attr('content'),
        type: "name",
        value: document.getElementById("input-name").value,
      },
      function (data) {
        // $('#alert').html("氏名を" + data + "に変更しました");
        // $('#nowname').html(data);
        // $('#sessionName').html(data);
      }
  );
  });

  //電話番号変更処理
    $("#button-phone").click(function (event) {
      $.post(
        "store",
        {
          '_token': $('meta[phone=csrf-token]').attr('content'),
          type: "phone1",
          value: document.getElementById("input-phone1").value,
        },
        function (data) {
          // $('#alert').html("氏名を" + data + "に変更しました");
          // $('#nowname').html(data);
          // $('#sessionName').html(data);
        }
  );
  });

  //メールアドレス変更処理
  $("#button-email").click(function (event) {
    $.post(
      "store",
      {
        '_token': $('meta[newemail=csrf-token]').attr('content'),
        type: "email",
        value: document.getElementById("input-email").value,
      },
      function (data) {
        // $('#alert').html("氏名を" + data + "に変更しました");
        // $('#nowname').html(data);
        // $('#sessionName').html(data);
      }
  );
  });

  //パスワード変更処理
  $("#button-password").click(function (event) {
    $.post(
      "store",
      {
        '_token': $('meta[newpassword=csrf-token]').attr('content'),
        type: "password",
        value: document.getElementById("input-new-password").value,
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

