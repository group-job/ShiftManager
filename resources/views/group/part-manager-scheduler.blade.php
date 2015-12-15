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
    height:400,
    defaultDate: '2015-12-17',
    titleFormat: {
      month: 'YYYY年 M月', // 2014年9月
      week: 'YYYY年 M月 D日',
      day: 'YYYY年 M月 D日[(]ddd[)]', // 2014年9月7日(火)
    },
    dayNamesShort: ['日', '月', '火', '水', '木', '金', '土'],
    timeFormat: 'H:mm',
    editable: true,
    aspectRatio: 1.0,
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
    resources:{!!$calendarUsersJson!!},
    events:{!!$calendarEventsJson!!},
    // -----------------------日付クリック処理----------------------------------
    dayClick: function(date, jsEvent, view, resourceObj) {
        // 可視状態のフォーム非表示
        $('.fc-event').tooltipster('hide');
        $('.togglable').hide();
        //フォーム初期化
        $("#input-name-add-shift").html(resourceObj.title);
        $("#input-user-id-add-shift").val(resourceObj.id);
        $("#input-date-add-shift").val();
        //フォーム表示処理
        $("#div-add-shift").css('top',jsEvent.pageY-205+"px");
        $("#div-add-shift").css('left',jsEvent.pageX-285+"px");
        $("#div-add-shift").show("fast");
        // 登録されているイベントハンドラを削除。 イベント複数回クリック対策
        $("#btn-add-add-shift").unbind('click');
        //変更/申請ボタンクリック時処理
        $("#btn-add-add-shift").on('click', function(event) {
          var shiftId = postCync($(this).closest("form"),true);
          console.log(shiftId);
          if (shiftId !== null){
            eventData = {
              resourceId:resourceObj.id,
               title: $("#input-note-add-shift").val(),
               start:$("#input-date-add-shift").val()+"T"+$("#input-start-time-add-shift").val(),
               end: $("#input-date-add-shift").val()+"T"+$("#input-end-time-add-shift").val(),
               date: $("#input-date-add-shift").val(),
               start_time : $("#input-start-time-add-shift").val(),
               end_time : $("#input-end-time-add-shift").val(),
               className: ['event-status1','schedule-event'],
               note: $("#input-note-add-shift").val(),
               status: 1,
               id: shiftId,
            };
            $('#manager-scheduler').fullCalendar('renderEvent', eventData, true);
            alertify.success('シフトを作成しました');
          }else {
            alertify.danger('シフトの作成に失敗しました');
          }
      });
    },

    // ------------------イベントクリック時処理----------------------------------
    eventClick: function(calEvent, jsEvent, view) {
       // 可視状態のフォーム非表示
       $('.schedule-event').tooltipster('hide');
       $('.togglable').hide();
       //シフトの種類で場合分け
           //グループシフトクリック時
         switch (calEvent.status) {
           case 0:
             // 申請シフトクリック時
             $("#input-add-approval-shift-id").val(calEvent.id);
             //  //ボタン表示処理
             $("#button-add-approval-approve").css('top',jsEvent.pageY-215+"px");
             $("#button-add-approval-approve").css('left',jsEvent.pageX-290+"px");
             $("#button-add-approval-deny").css('top',jsEvent.pageY-215+"px");
             $("#button-add-approval-deny").css('left',jsEvent.pageX-256+"px");
             $("#button-add-approval-approve").show("fast");
             $("#button-add-approval-deny").show("fast");
             // 登録されているイベントハンドラを削除。 イベント複数回クリック対策
             $("#button-add-approval-approve").unbind('click');
             $("#button-add-approval-deny").unbind('click');
             //承認ボタンクリック時の処理を定義
             $("#button-add-approval-approve").on('click', function(event) {
               $("#input-add-approval-status").val('2');
               postCync($(this).closest("form"),true);
               calEvent.className = ["event-status2","schedule-event"];
               calEvent.status = 2;
               $('#manager-scheduler').fullCalendar('updateEvent', calEvent);
                alertify.success(calEvent.title+'の'+calEvent.date+'のシフトを承認しました');
             });

             //拒否ボタンクリック時の処理を定義
             $("#button-add-approval-deny").on('click', function(event) {
               $("#input-add-approval-status").val('4');
               postCync($(this).closest("form"),true);
               $('#manager-scheduler').fullCalendar("removeEvents", calEvent._id);
               alertify.success(calEvent.title+'の'+calEvent.date+'のシフトを拒否しました');
             });
             break;

           case 1:
             //仮シフトクリック時
             //フォーム初期化
             $("#input-shift-id-edit-shift").val(calEvent.id);
             $("#input-name-edit-shift").html(calEvent.name);
             $("#input-date-edit-shift").val(calEvent.date);
             $("#input-start-time-edit-shift").val(calEvent.start_time);
             $("#input-end-time-edit-shift").val(calEvent.end_time);
             $("#input-note-edit-shift").val(calEvent.note);
             //フォーム表示処理
             $("#div-edit-shift").css('top',jsEvent.pageY-205+"px");
             $("#div-edit-shift").css('left',jsEvent.pageX-285+"px");
             $("#div-edit-shift").show("fast");
             // 登録されているイベントハンドラを削除。 イベント複数回クリック対策
             $("#btn-update-edit-shift").unbind('click');
             $("#btn-delete-edit-shift").unbind('click');
             //変更ボタンクリック時処理
             $("#btn-update-edit-shift").on('click', function(event) {
               $("#input-status-edit-shift").val('1');
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
             case 2:
              //確定シフトクリック時
              //削除依頼ボタン表示
              $("#button-delete-delete-shift").css('top',jsEvent.pageY-215+"px");
              $("#button-delete-delete-shift").css('left',jsEvent.pageX-255+"px");
              $("#input-shift-id-delete-shift").val(calEvent.id);
              $("#button-delete-delete-shift").show("fast");
              // 登録されているイベントハンドラを削除。 イベント複数回クリック
              $("#button-delete-delete-shift").unbind('click');
              //ボタンクリック時の処理を定義
              $("#button-delete-delete-shift").on('click', function(event) {
              postAcync($(this).closest("form"),false);
              $('#manager-scheduler').fullCalendar("removeEvents", calEvent._id);
              $('#calendar').fullCalendar('updateEvent', calEvent);
              alertify.success(calEvent.title+'に削除をしました');
              });
              break;
              break;
            case 3:
              //削除依頼ボタンクリック時処理
              $("#input-delete-approval-shift-id").val(calEvent.id);
              //  //ボタン表示処理
              $("#button-delete-approval-approve").css('top',jsEvent.pageY-215+"px");
              $("#button-delete-approval-approve").css('left',jsEvent.pageX-290+"px");
              $("#button-delete-approval-deny").css('top',jsEvent.pageY-215+"px");
              $("#button-delete-approval-deny").css('left',jsEvent.pageX-256+"px");
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
              break;
           default:
             //希望･削除依頼シフトクリック時
             //なにもしない
         }
     },
    //------------------イベントマウスオーバー時処理-------------------------------
    eventMouseover:function( event, jsEvent, view ) {
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

  //=======================================================scheduler描画処理
  //========================各ボタン、ウィンドウリセット==========================
  $('div').click(function(event){
      // console.log(this.id+"/"+this.className);
      if (this.className === "fc-bg" ){
        $('.togglable').hide();
      }else if (this.className === "fc-view-container" || this.id === "div-edit-shift" || this.id === "div-add-shift") {
        event.stopPropagation();
      }else if (this.id === "contents-space" ||this.id==="title-space" || this.id === "side-menu"){
        $('.togglable').hide();
      }
  });
});
  // ===========================テスト===========================================
  function test(id){
    var $form = $('#'+id);
    alert($form);
  }
  </script>
