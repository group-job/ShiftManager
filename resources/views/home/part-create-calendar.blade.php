{{-- カレンダーを描画するスクリプト --}}
<script>
$(document).ready(function() {
  $('#calendar').fullCalendar({
    buttonText: {
      today: '今日'
    },

    defaultDate: '2015-10-28',
    selectable: false,
			selectHelper: false,
			select: function(start, end) {
				var title = prompt('Event Title:');
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');
			},
			editable: true,

    aditable: true,
    slotEventOverlap: true,
    eventLimit: true, // allow "more" link when too many events
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

    // 日付クリック処理
    dayClick: function(date, jsEvent, view) {
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

    // // イベントクリック処理
    eventClick: function(calEvent, jsEvent, view) {
      alert("イベントクリック!");
    },
    events: [
      {
        title: 'とりまる',
        start: '2015-10-01T10:30:00',
        end: '2015-10-01T12:30:00'
      },
      {
        title: 'とりまる',
        start: '2015-10-05T10:30:00',
        end: '2015-10-05T12:30:00'
      },
      {
        title: 'らうわん',
        start: '2015-10-18T14:30:00',
        end: '2015-10-18T15:30:00'
      },
    ]

  });

});
</script>
