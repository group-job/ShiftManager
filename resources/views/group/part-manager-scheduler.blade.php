{{-- カレンダーを描画するスクリプト --}}
{{-- Fields
  Object $myshifts
  --}}
  <script>
  $(document).ready(function() {
    // =========================スケジューラー描画====================================
    $('#manager-scheduler').fullCalendar({
      resourceAreaWidth: 230,
      defaultDate: '2015-12-07',
      editable: true,
      aspectRatio: 1.5,
      scrollTime: '00:00',
      header: {
        left: 'promptResource today prev,next',
        center: 'title',
        right: 'timelineDay,timelineThreeDays,agendaWeek,month'
      },
      customButtons: {
        promptResource: {
          text: '+ room',
          click: function() {
            var title = prompt('Room name');
            if (title) {
              $('#manager-scheduler').fullCalendar(
                'addResource',
                { title: title },
                true // scroll to the new resource?
              );
            }
          }
        }
      },
      defaultView: 'timelineDay',
      views: {
        timelineThreeDays: {
          type: 'timeline',
          duration: { days: 3 }
        }
      },
      resourceLabelText: 'Rooms',
      resources: [
        { id: 'a', title: 'Auditorium A' },
        { id: 'b', title: 'Auditorium B', eventColor: 'green' },
        { id: 'c', title: 'Auditorium C', eventColor: 'orange' },
        { id: 'd', title: 'Auditorium D', children: [
          { id: 'd1', title: 'Room D1' },
          { id: 'd2', title: 'Room D2' }
        ] },
        { id: 'e', title: 'Auditorium E' },
        { id: 'f', title: 'Auditorium F', eventColor: 'red' },
        { id: 'g', title: 'Auditorium G' },
        { id: 'h', title: 'Auditorium H' },
      ],
      events: [
        { id: '1', resourceId: 'b', start: '2015-12-07T02:00:00', end: '2015-12-07T07:00:00', title: 'event 1' },
        { id: '2', resourceId: 'c', start: '2015-12-07T05:00:00', end: '2015-12-07T22:00:00', title: 'event 2' },
        { id: '3', resourceId: 'd', start: '2015-12-06', end: '2015-12-08', title: 'event 3' },
        { id: '4', resourceId: 'e', start: '2015-12-07T03:00:00', end: '2015-12-07T08:00:00', title: 'event 4' },
        { id: '5', resourceId: 'f', start: '2015-12-07T00:30:00', end: '2015-12-07T02:30:00', title: 'event 5' }
      ]
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
