<br>
<script>
jQuery(document).ready(function () {
  //名前変更処理
  $("#button-test").click(function (event) {
    $.get(
      "chat",
      null,
      function (data) {
        var chatLog;
        for (var i = 0; i < data.length; i++) {
          chatLog += data[i]["name"]+data[i]["text"]+"<br>";
        }
        $('#show-chat').html(chatLog);
        // $('#show-name').html(data[i]["name"]);

        // $('#nowname').html(data);
        // $('#sessionName').html(data);
      }
  );
  });
});
</script>

</script>
<div class="row col-lg-offset-3">
  {{-- <div id="show-name" class="col-lg-2"></div> --}}
  {{-- <div id="show-text" class="col-lg-6"></div> --}}
  <div id="show-chat" class="col-lg-6"></div>

  <input type="button" name="button-test" id="button-test" value="test">
</div>
