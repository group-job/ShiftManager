{{-- 名前変更 --}}
    <div class="panel panel-info">{{-- パネル --}}

        <div class="panel-heading" >{{-- パネルヘッダー --}}
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#form-name" data-toggle="tooltip" title="クリックしてね">氏名変更</a>
            </h4>
        </div>{{-- パネルヘッダー --}}

        <div id="form-name" class="panel-collapse collapse">{{-- 隠すためのやつ --}}
            <div class="panel-body">{{-- パネルボデー --}}
              <div class="row">
					           <label class="control-label  col-lg-3">現在の氏名</label>
					          <label for="input-address" class="col-lg-9  control-label" id="nowaddress">{{ Session::get('user_name')}}</label>
				      </div>
					    <div class="row">
					           <div class="form-group">
                       {{-- {!! Form::open() !!} --}}
						                 <label class="col-lg-3" for="address1">
                               {!! Form::label('user_name', '新しい名前：') !!}
                             </label>
						                 <div class="col-lg-4">
                               {!! Form::text('user_name', null, ['class' => 'form-control', 'id' => 'input-name'  ]) !!}
                             </div>
                             {{-- {!! Form::button('変更', ['class' => 'btn btn-primary form-control', 'id' => 'button-name', 'data-loading-text' => '変更中']) !!} --}}
                             <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-2" id="button-name" data-loading-text="変更中" value="氏名変更">
                             {{-- {!! Form::close() !!} --}}
                     </div>
                     <br />

			        </div>
		        </div>{{-- パネルボデー --}}
	      </div>{{-- 隠すためのやつ --}}

      </div>{{-- パネル --}}
