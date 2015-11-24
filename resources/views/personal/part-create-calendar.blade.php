{{-- カレンダーを描画するスクリプト --}}
{{-- Fields
  Object $myshifts
  --}}
  <script>
  $(document).ready(function() {
    // =========================カレンダー描画====================================
    $('#calendar').fullCalendar({
      //ヘッダー設定
      header: {
               // title, prev, next, prevYear, nextYear, today
               left: 'prev,next today',
               center: 'title',
               right: 'month,agendaWeek'
           },

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

      //------------------イベントマウスオーバー時処理-------------------------------
      eventMouseover:function( event, jsEvent, view ) {
        //イベントの詳細を表示するよ
        content = "<p>勤務先:"+event.title+"</p><p>開始時刻:"+event.start_time+"</p><p>終了時刻:"+event.end_time+"</p>";
        $('.fc-event').tooltipster('content',$(content));
      },

      // ------------------イベントクリック時処理----------------------------------
      eventClick: function(calEvent, jsEvent, view) {
        $('.fc-event').tooltipster('hide');
        $('.togglable').hide();
        if(calEvent.my_shift_flg){
            //TODO マイシフト編集ポップアップ

          $("#button-test").on('click', function(event) {

          });
        }else {
          switch (calEvent.status) {
            case 1:
              // 仮シフトクリック時
              //TODO 仮シフト承認/拒否ボタン表示
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
                postAcync(this,false);
                calEvent.className = "event-status2";
                calEvent.status = 2;
                $('#calendar').fullCalendar('updateEvent', calEvent);
                 alertify.success(calEvent.title+'の'+calEvent.date+'のシフトを承認しました');
              });

              //拒否ボタンクリック時の処理を定義
              $("#button-reply-deny").on('click', function(event) {
                $("#input-reply-status").val('4');
                postAcync(this,false);
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
                postAcync(this,false);
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
        $('.event-status2').tooltipster({
            // position: 'right',
            trigger: 'click',
            multiple:true,
            autoClose:false,
            contentAsHTML: true,
            content: $('<button class="btn-warning" id="test-button" style="z-index:5;">aaa</button>'),
            theme: 'theme-event-detail-tooltip',
        });
      }
    });
    //=======================================================fullcalendar描画処理
    //========================各ボタン、ウィンドウリセット==========================
    $('div').click(function(event){
      // alert(this.id+"/"+this.className);
        if(this.id === "calendar"){
          event.stopPropagation();
        }
        else if (this.id === "contents-space" || this.className === "fc-bg"){
          event.stopPropagation();
          $('.togglable').hide();
        }else if (this.className === "fc-content") {
          $('.togglable').hide();
        }else if(this.className === "fc-day-grid-container") {
          event.stopPropagation();
        }
    });
  });
  // ===========================テスト===========================================
  function test(id){
    var $form = $('#'+id);
    alert($form);
  }
  </script>
