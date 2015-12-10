{{-- カレンダーを描画するスクリプト --}}
{{-- Fields
  Object $myshifts
  --}}
  <script>
  $(document).ready(function() {
    // =========================カレンダー描画====================================
    $('#calendar').fullCalendar({
      //ライセンス
      schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
      //ヘッダー設定
      header: {
               // title, prev, next, prevYear, nextYear, today
               left: 'prev,next today',
               center: 'title',
               right: 'month,agendaWeek'
           },
      aspectRatio: 1.9,
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
      aditable: true,
      allDaySlot: true,
      slotEventOverlap: true,
      eventLimit: true, // allow "more" link when too many events
      events:{!!$calendarEventsJson!!},

      // -----------------------日付クリック処理----------------------------------
      dayClick: function(date, jsEvent, view) {
        // 可視状態のフォーム非表示
        $('.fc-event').tooltipster('hide');
        $('.togglable').hide();
        //フォーム初期化
        $("#input-date-add-shift").val(date.format());
        if($("#input-group-add-shift option:selected")[0].className === "option-managing-group-add-shift"){
          $("#btn-add-add-shift").text("追加");
        }else {
          $("#btn-add-add-shift").text("申請");
        }
        //フォーム表示処理
        $("#div-add-shift").css('top',jsEvent.pageY-100+"px");
        $("#div-add-shift").css('left',jsEvent.pageX-273+"px");
        $("#div-add-shift").show("fast");
        //グループ選択時フォーム再設定
        $("#input-group-add-shift").change(function(event) {
          if($("option:selected")[0].className === "option-managing-group-add-shift"){
            $("#btn-add-add-shift").text("追加");
          }else {
            $("#btn-add-add-shift").text("申請");
          }
        });
        // 登録されているイベントハンドラを削除。 イベント複数回クリック対策
        $("#btn-add-add-shift").unbind('click');
        //変更/申請ボタンクリック時処理
        $("#btn-add-add-shift").on('click', function(event) {
          var myShiftFlg;
          if($("option:selected")[0].className === "option-managing-group-add-shift"){
            $("#input-status-add-shift").val(2);
            myShiftFlg = true;
          }else {
            $("#input-status-add-shift").val(0);
            myShiftFlg = false;
          }
          var shiftId = postCync($(this).closest("form"),true);

          if (shiftId !== null){
            eventData = {
               title: $("#input-group-add-shift option:selected").text(),
               start:$("#input-date-add-shift").val()+"T"+$("#input-start-time-add-shift").val(),
               end: $("#input-date-add-shift").val()+"T"+$("#input-end-time-add-shift").val(),
               date: $("#input-date-add-shift").val(),
               start_time : $("#input-start-time-add-shift").val(),
               end_time : $("#input-end-time-add-shift").val(),
               className: 'event-status'+$("#input-status-add-shift").val(),
               note: $("input-note-add-shift").val(),
               my_shift_flg: myShiftFlg,
               status: $("#input-status-add-shift").val(),
               shift_id: shiftId,
            };
            $('#calendar').fullCalendar('renderEvent', eventData, true);
            alertify.success('シフトを作成しました');
          }else {
            alertify.danger('シフトの作成に失敗しました');
          }
      });

        // var title = prompt('Event Title:');
        // var eventData;
        // if (title) {
        //   // stick? = true
        // }
        // $('#calendar').fullCalendar('unselect');
      },

      //------------------イベントマウスオーバー時処理-------------------------------
      eventMouseover:function( event, jsEvent, view ) {
        //イベントの詳細を表示するよ
        content = "<p>勤務先:"+event.title+"</p><p>開始時刻:"+event.start_time+"</p><p>終了時刻:"+event.end_time+"</p><p>備考:"+event.note+"</p>";
        $('.fc-event').tooltipster('content',$(content));
      },

      // ------------------イベントクリック時処理----------------------------------
     eventClick: function(calEvent, jsEvent, view) {
        // 可視状態のフォーム非表示
        $('.fc-event').tooltipster('hide');
        $('.togglable').hide();
        //シフトの種類で場合分け
        if(calEvent.my_shift_flg){
            //マイシフトクリック時
            //フォーム初期化
            $("#input-shift-id-edit-shift").val(calEvent.shift_id);
            $("#input-group-name-edit-shift").html(calEvent.title);
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
              $('#calendar').fullCalendar('updateEvent', calEvent);
            });
            //削除ボタンクリック時処理
            $("#btn-delete-edit-shift").on('click', function(event) {
              $("#input-status-edit-shift").val('4');
              postAcync($(this).closest("form"),true);
              $('#calendar').fullCalendar("removeEvents", calEvent._id);
              alertify.success(calEvent.title+'の'+calEvent.date+'のシフトを削除しました');
            });
        }else {
            //グループシフトクリック時
          switch (calEvent.status) {
            case 1:
              // 仮シフトクリック時
              $("#input-reply-shift-id").val(calEvent.shift_id);
              //ボタン表示処理
              $("#button-reply-approve").css('top',jsEvent.pageY-100+"px");
              $("#button-reply-approve").css('left',jsEvent.pageX-273+"px");
              $("#button-reply-deny").css('top',jsEvent.pageY-100+"px");
              $("#button-reply-deny").css('left',jsEvent.pageX-240+"px");
              $("#button-reply-approve").show("fast");
              $("#button-reply-deny").show("fast");
              // 登録されているイベントハンドラを削除。 イベント複数回クリック対策
              $("#button-reply-approve").unbind('click');
              $("#button-reply-deny").unbind('click');

              //承認ボタンクリック時の処理を定義
              $("#button-reply-approve").on('click', function(event) {
                $("#input-reply-status").val('2');
                postAcync($(this).closest("form"),false);
                calEvent.className = "event-status2";
                calEvent.status = 2;
                $('#calendar').fullCalendar('updateEvent', calEvent);
                 alertify.success(calEvent.title+'の'+calEvent.date+'のシフトを承認しました');
              });

              //拒否ボタンクリック時の処理を定義
              $("#button-reply-deny").on('click', function(event) {
                $("#input-reply-status").val('4');
                postAcync($(this).closest("form"),false);
                $('#calendar').fullCalendar("removeEvents", calEvent._id);
                alertify.success(calEvent.title+'の'+calEvent.date+'のシフトを拒否しました');

              });
              break;
            case 2:
              //確定シフトクリック時
              //削除依頼ボタン表示
              $("#button-request-delete").css('top',jsEvent.pageY-100+"px");
              $("#button-request-delete").css('left',jsEvent.pageX-260+"px");
              $("#input-request-delete-shift-id").val(calEvent.shift_id);
              $("#button-request-delete").show("fast");
              // 登録されているイベントハンドラを削除。 イベント複数回クリック
              $("#button-request-delete").unbind('click');
              //ボタンクリック時の処理を定義
              $("#button-request-delete").on('click', function(event) {
                postAcync($(this).closest("form"),false);
                calEvent.className = "event-status3";
                calEvent.status = 3;
                $('#calendar').fullCalendar('updateEvent', calEvent);
                alertify.success(calEvent.title+'に削除依頼をしました');
              });
              break;
            default:
              //希望･削除依頼シフトクリック時
              //なにもしない
          }
        }
      },
      // ----------------------------カレンダー描画終了---------------------------
      eventAfterAllRender:function( view ) {
        // ツールチップ----------------------
        // カレンダー描画後に毎回ツールチップ設定
        $('.fc-event').tooltipster({
            position: 'right',
            content: $('<p>aaa</p>'),
            theme: 'theme-event-detail-tooltip',
        });
        // シフト編集ポップアップをtooltipsterで実装するかまようところ
        // var el = $('<button type="submit" class="btn-warning" id="test-button" style="z-index:5;">aaa</button><a title="Close" href="#">kimiya</a>');
        // el.find('button').click(function(){ alert('hello') });
        // $('.event-status2').tooltipster({
        //     // position: 'right',
        //     trigger: 'click',
        //     multiple:true,
        //     autoClose:false,
        //     contentAsHTML: true,
        //     content: el,
        //     theme: 'theme-event-detail-tooltip',
        // });
      }
    });
    //=======================================================fullcalendar描画処理
    //========================各ボタン、ウィンドウリセット==========================
    $('div').click(function(event){
      // alert(this.id+"/"+this.className);
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
  });
  // ===========================テスト===========================================
  function test(id){
    var $form = $('#'+id);
    alert($form);
  }
  </script>
