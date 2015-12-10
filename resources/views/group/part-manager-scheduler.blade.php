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
    events:{!!$calendarEventsJson!!},
    // ------------------イベントクリック時処理----------------------------------
    eventClick: function(calEvent, jsEvent, view) {
       // 可視状態のフォーム非表示
       $('.schedule-event').tooltipster('hide');
       $('.togglable').hide();
       //シフトの種類で場合分け
           //グループシフトクリック時
         switch (calEvent.status) {
           case 0:
           console.log("申請シフト");
             // 申請シフトクリック時
             $("#input-add-approval-shift-id").val(calEvent.id);
             //  //ボタン表示処理
             $("#button-add-approval-approve").css('top',jsEvent.pageY-100+"px");
             $("#button-add-approval-approve").css('left',jsEvent.pageX-273+"px");
             $("#button-add-approval-deny").css('top',jsEvent.pageY-100+"px");
             $("#button-add-approval-deny").css('left',jsEvent.pageX-240+"px");
             $("#button-add-approval-approve").show("fast");
             $("#button-add-approval-deny").show("fast");
             // 登録されているイベントハンドラを削除。 イベント複数回クリック対策
             $("#button-add-approval-approve").unbind('click');
             $("#button-add-approval-deny").unbind('click');
             //承認ボタンクリック時の処理を定義
             $("#button-add-approval-approve").on('click', function(event) {
               $("#input-add-approval-status").val('2');
               postAcync($(this).closest("form"),true);
               calEvent.className = ["event-status2","schedule-event"];
               calEvent.status = 2;
               $('#manager-scheduler').fullCalendar('updateEvent', calEvent);
                alertify.success(calEvent.title+'の'+calEvent.date+'のシフトを承認しました');
             });

             //拒否ボタンクリック時の処理を定義
             $("#button-add-approval-deny").on('click', function(event) {
               $("#input-add-approval-status").val('4');
               postAcync($(this).closest("form"),true);
               $('#manager-scheduler').fullCalendar("removeEvents", calEvent._id);
               alertify.success(calEvent.title+'の'+calEvent.date+'のシフトを拒否しました');
             });
             break;
           case 1:
           console.log("仮シフト");
             //確定シフトクリック時
             //削除依頼ボタン表示
            //  $("#button-request-delete").css('top',jsEvent.pageY-100+"px");
            //  $("#button-request-delete").css('left',jsEvent.pageX-260+"px");
            //  $("#input-request-delete-shift-id").val(calEvent.shift_id);
            //  $("#button-request-delete").show("fast");
            //  // 登録されているイベントハンドラを削除。 イベント複数回クリック
            //  $("#button-request-delete").unbind('click');
            //  //ボタンクリック時の処理を定義
            //  $("#button-request-delete").on('click', function(event) {
            //    postAcync($(this).closest("form"),false);
            //    calEvent.className = "event-status3";
            //    calEvent.status = 3;
            //    $('#calendar').fullCalendar('updateEvent', calEvent);
            //    alertify.success(calEvent.title+'に削除依頼をしました');
            //  });
             break;
           case 2:
             console.log("確定シフト");
             //フォーム初期化
             $("#input-shift-id-edit-shift").val(calEvent.shift_id);
             $("#input-name-edit-shift").html(calEvent.name);
             $("#input-date-edit-shift").val(calEvent.date);
             $("#input-start-time-edit-shift").val(calEvent.start_time);
             $("#input-end-time-edit-shift").val(calEvent.end_time);
             $("#input-note-edit-shift").val(calEvent.note);
             //フォーム表示処理
             $("#div-edit-shift").css('top',jsEvent.pageY-100+"px");
             $("#div-edit-shift").css('left',jsEvent.pageX-273+"px");
             $("#div-edit-shift").show("fast");
             // 登録されているイベントハンドラを削除。 イベント複数回クリック対策
             $("#btn-update-edit-shift").unbind('click');
             $("#btn-delete-edit-shift").unbind('click');
             //変更ボタンクリック時処理
             $("#btn-update-edit-shift").on('click', function(event) {
               $("#input-status-edit-shift").val('2');
               postAcync($(this).closest("form"),true);
               calEvent.start_time = $("#input-start-time-edit-shift").val();
               calEvent.end_time = $("#input-end-time-edit-shift").val();
               calEvent.start = $("#input-date-edit-shift").val()+"T"+$("#input-start-time-edit-shift").val();
               calEvent.end = $("#input-date-edit-shift").val()+"T"+$("#input-end-time-edit-shift").val();
               $('#manager-scheduler').fullCalendar('updateEvent', calEvent);
             });
             //削除ボタンクリック時処理
             $("#btn-delete-edit-shift").on('click', function(event) {
               $("#input-status-edit-shift").val('4');
               postAcync($(this).closest("form"),true);
               $('#manager-scheduler').fullCalendar("removeEvents", calEvent._id);
               alertify.success(calEvent.title+'の'+calEvent.date+'のシフトを削除しました');
             });
             break;
            case 3:
              console.log("削除依頼");
              //削除依頼ボタン表示
              $("#input-add-approval-shift-id").val(calEvent.id);
              //  //ボタン表示処理
              $("#button-delete-approval-approve").css('top',jsEvent.pageY-100+"px");
              $("#button-delete-approval-approve").css('left',jsEvent.pageX-273+"px");
              $("#button-delete-approval-deny").css('top',jsEvent.pageY-100+"px");
              $("#button-delete-approval-deny").css('left',jsEvent.pageX-240+"px");
              $("#button-delete-approval-approve").show("fast");
              $("#button-delete-approval-deny").show("fast");
              // 登録されているイベントハンドラを削除。 イベント複数回クリック対策
              $("#button-delete-approval-approve").unbind('click');
              $("#button-delete-approval-deny").unbind('click');
              //承認ボタンクリック時の処理を定義
              $("#button-delete-approval-approve").on('click', function(event) {
                $("#input-delete-approval-status").val('4');
                postAcync($(this).closest("form"),true);
                $('#manager-scheduler').fullCalendar("removeEvents", calEvent._id);
                alertify.success(calEvent.title+'の'+calEvent.date+'の削除依頼を承認し、シフトを削除しました');
              });

              //拒否ボタンクリック時の処理を定義
              $("#button-delete-approval-deny").on('click', function(event) {
                $("#input-delete-approval-status").val('2');
                postAcync($(this).closest("form"),true);
                calEvent.className = ["event-status2","schedule-event"];
                calEvent.status = 2;
                $('#manager-scheduler').fullCalendar('updateEvent', calEvent);
                 alertify.success(calEvent.title+'の'+calEvent.date+'の削除依頼を拒否しました');
              });
           default:
             //希望･削除依頼シフトクリック時
             //なにもしない
         }
     },
    //------------------イベントマウスオーバー時処理-------------------------------
    eventMouseover:function( event, jsEvent, view ) {
      console.log(event);
      //イベントの詳細を表示するよ
      content = "<p>名前:"+event.name+"</p><p>開始時刻:"+event.start_time+"</p><p>終了時刻:"+event.end_time+"</p><p>備考:"+event.note+"</p>";
      $('.schedule-event').tooltipster('content',$(content));
    },
    // ----------------------------カレンダー描画終了---------------------------
    eventAfterAllRender:function( view ) {
      $('.schedule-event').tooltipster({
        position: 'right',
        content: $('<p>aaa</p>'),
        theme: 'theme-event-detail-tooltip',

      });
    }
  });
});
  //=======================================================scheduler描画処理
  //========================各ボタン、ウィンドウリセット==========================
  $('div').click(function(event){
    alert(this.id+"/"+this.className);
      if (this.className === "fc-button-group" || this.className === "fc-content" || this.id === "side-menu") {
        $('.togglable').hide();
      }
      else if(this.id === "calendar"  || this.id === "div-edit-shift" || this.id ==="div-add-shift" || this.className === "fc-day-grid-container"){
        event.stopPropagation();
      }
      else if (this.id === "contents-space" || this.id === "title-space"){
        event.stopPropagation();
        $('.togglable').hide();
      }
  });
  // ===========================テスト===========================================
  function test(id){
    var $form = $('#'+id);
    alert($form);
  }
  </script>
