{{-- カレンダーを描画するスクリプト --}}
{{-- Fields
  Object $myshifts
  --}}
  <script>
  $(document).ready(function() {
    // =========================カレンダー描画====================================
    $('#manager-calendar').fullCalendar({
      //ライセンス
      schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
      //ヘッダー設定
      header: {
        left: 'prev',
        center: 'title',
        right: 'next'
      },
      height:200,
      aspectRatio: 1.5,
      buttonText: {
        // today: '今日'
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

      editable: false,
      aditable: false,
      allDaySlot: false,
      slotEventOverlap: true,
      eventLimit: true, // allow "more" link when too many events
      events:{!!$calendarEventsJson!!},

      // -----------------------日付クリック処理----------------------------------
      dayClick: function(date, jsEvent, view) {
        console.log(date._d);
      },

      //------------------イベントマウスオーバー時処理-------------------------------
      eventMouseover:function( event, jsEvent, view ) {
      },

      // ------------------イベントクリック時処理----------------------------------
      eventClick: function(calEvent, jsEvent, view) {
      },
      // ----------------------------カレンダー描画終了---------------------------
      eventAfterAllRender:function( view ) {
      }
    });
    //=======================================================fullcalendar描画処理
    //========================各ボタン、ウィンドウリセット==========================
  });
  // ===========================テスト===========================================
  function test(id){
    var $form = $('#'+id);
    alert($form);
  }
  </script>
