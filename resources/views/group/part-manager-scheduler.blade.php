{{-- カレンダーを描画するスクリプト --}}
{{-- Fields
  Object $myshifts
  --}}
  <script>
  $(document).ready(function() {
    // =========================スケジューラー描画====================================
    $('#manager-scheduler').fullCalendar({
      schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
      resourceAreaWidth: 150,
      height:300,
      defaultDate: '2015-12-11',
      titleFormat: {
        month: 'YYYY年 M月', // 2014年9月
        week: 'YYYY年 M月 D日',
        day: 'YYYY年 M月 D日[(]ddd[)]', // 2014年9月7日(火)
      },
      dayNamesShort: ['日', '月', '火', '水', '木', '金', '土'],
      timeFormat: 'H:mm',
      editable: true,
      aspectRatio: 1.5,
      scrollTime: '00:30',
      header: {
        left: 'promptResource today prev,next',
        center: 'title',
        right: 'timelineDay,agendaWeek,month'
      },
      // customButtons: {
      //   promptResource: {
      //     text: '+ room',
      //     click: function() {
      //       var title = prompt('Room name');
      //       if (title) {
      //         $('#manager-scheduler').fullCalendar(
      //           'addResource',
      //           { title: title },
      //           true // scroll to the new resource?
      //         );
      //       }
      //     }
      //   }
      // },
      defaultView: 'timelineDay',
      views: {
        timelineThreeDays: {
          type: 'timeline',
          duration: { days: 3 }
        }
      },
      resourceLabelText: 'メンバー',
      resources: [
        { id: '1', title: 'Kimmy' },
        { id: '2', title: 'Ussy', },
        { id: '3', title: 'Masu',},
        { id: '4', title: 'Naga' },
        { id: '5', title: 'Aki', },
      ],
      // events: [
      //   { id: '1', resourceId: 2, start: '2015-12-07T01:00:00', end: '2015-12-07T07:00:00', title: 'event 1' },
      // ]
        events:{!!$calendarEventsJson!!},
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
