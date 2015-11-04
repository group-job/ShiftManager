jQuery(document).ready(function () {
  //名前変更処理
  $("#button-name").click(function (event) {
    $.post(
      "store",
      {
        '_token': $('meta[name=csrf-token]').attr('content'),
        name : document.getElementById("input-name").value,
      },
      function (data) {
        // $('#alert').html("氏名を" + data + "に変更しました");
        // $('#nowname').html(data);
        // $('#sessionName').html(data);
      }
  );
  });


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
