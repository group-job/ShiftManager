{{-- カレンダーを描画するスクリプト --}}
{{-- Fields
  Object $myshifts
  --}}
  <script>
  $(document).ready(function() {
    //各ボタン、ウィンドウ初期化---------------------------------------------------
    // $('.togglable').hide();

    // カレンダー描画-------------------------------------------------------------
    $('#calendar').fullCalendar({
      //ヘッダー設定
      buttonText: {
        today: '今日'
      },
      // タイトルの書式
      titleFormat: {
        month: 'YYYY年 M月', // 2014年9月
        week: 'YYYY年 M月 D日',
        day: 'YYYY年 M月 D日[(]ddd[)]', // 2014年9月7日(火)
      },
      dayNames: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
      // 曜日略称
      dayNamesShort: ['日', '月', '火', '水', '木', '金', '土'],
      // 時間の書式
      timeFormat: 'H:mm',
      //デフォルトの日付 省略すると当日?
      // defaultDate: '2015-11-15',

      editable: true,
      aditable: true,
      slotEventOverlap: true,
      eventLimit: true, // allow "more" link when too many events
      events:{!!$calendarEventsJson!!},

      // 日付クリック処理
      dayClick: function(date, jsEvent, view) {
        //削除申請ボタンなどを非表示に
        $('.togglable').hide();
        var dataTooltip, insertHtml;
        var title = prompt('Event Title:');
        var eventData;
        if (title) {
          eventData = {
            title: title,
            start:date,
            // start: start,
            // end: end
          };
          $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
        }
        $('#calendar').fullCalendar('unselect');
      },

      //イベントマウスオーバー時処理
      eventMouseover:function( event, jsEvent, view ) {
        //イベントの詳細を表示するよ
      },

      // イベントクリック時処理
      eventClick: function(calEvent, jsEvent, view) {
        if(calEvent.user_id == calEvent.manager_id){
            //TODO マイシフト編集ポップアップ
        }else {
          switch (calEvent.status) {
            case 1:
              // 仮シフトクリック時
              //TODO 仮シフト承認/拒否ボタン表示

              break;
            case 2:
              //確定シフトクリック時
              //削除依頼ボタン表示
              $("#button-request-delete").css('top',jsEvent.pageY-110+"px");
              $("#button-request-delete").css('left',jsEvent.pageX-260+"px");
              $("#input-request-delete").val(calEvent.shift_id);
              $("#button-request-delete").show("fast");
              // $("#button-request-delete").onclick = postAcync("form-request-delete",true);
              // $("#button-request-delete").addEventListener("click", test1(), true);
              // 登録されているイベントハンドラを削除。 イベント複数回クリック
              $("#button-request-delete").unbind('click');
              $("#button-request-delete").on('click', function() {
                postAcync("form-request-delete",false);
                calEvent.className = "event-status3";
                $('#calendar').fullCalendar('updateEvent', calEvent);
              });
              break;
            default:
              //希望･削除依頼シフトクリック時
              //なにもしない
          }
        }
      },

    });
    // fullcalendar描画処理ここまで
    $('div').click(function(event){
        if (this.id === "contents-space" || this.className === "fc-bg"){
          event.stopPropagation();
          $('.togglable').hide();
        }else if (this.className === "fc-content") {
          $('.togglable').hide();
        }else if(this.className === "fc-day-grid-container") {
          event.stopPropagation();
        }
    });
  });
  function test(id){
    var $form = $('#'+id);
    $form.hide();
    alert($form);
  }
  </script>
