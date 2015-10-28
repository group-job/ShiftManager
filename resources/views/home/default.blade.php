<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>@yield('title','名前はまだない')</title>

  <!-- CSSを追加 -->
  <!-- ① 追加 -->
  {{-- <link rel="stylesheet" href="/css/app.css"> --}}
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
<link href='css/bootstrap.css' rel='stylesheet' media='print' />
<script src='js/jquery.min.js'></script>
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.js'></script>
<script src='js/bootstrap.js'></script>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			defaultDate: '2015-02-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			editable:true,
			eventClick:function(event, jsEvent){
    var title = prompt('予定を入力してください:', event.title);
    if(title && title!=""){
        event.title = title;
        //updateEvent      Reports changes to an event and renders them on the calendar.
        //http://arshaw.com/fullcalendar/docs/event_data/updateEvent/
        $('#calendar').fullCalendar('updateEvent', event); //イベント（予定）の修正
    }else{
        //removeEventSource     Dynamically removes an event source.
        //http://arshaw.com/fullcalendar/docs/event_data/removeEventSource/
        $('#calendar').fullCalendar("removeEvents", event.id); //イベント（予定）の削除
    }
},
//
			events: [
				{
					title: 'All Day Event',
					start: '2015-02-01'
				},
				{
					title: 'Long Event',
					start: '2015-02-07',
					end: '2015-02-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2015-02-09T16:00:00'
				}
			]
		});

	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>
</body>
</html>
