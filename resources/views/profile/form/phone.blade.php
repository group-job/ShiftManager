{{-- 電話番号変更 --}}
<div class="panel panel-info">{{-- パネル --}}
    <div class="panel-heading" >{{-- パネルヘッダー --}}
        <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#form-phone" data-toggle="tooltip" title="クリックしてね">電話番号変更</a>
        </h4>
    </div>{{-- パネルヘッダー --}}
    <div id="form-phone" class="panel-collapse collapse">{{-- 隠すためのやつ --}}
        <div class="panel-body">{{-- パネルボデー --}}
            <div class="row">
                <label class="control-label  col-lg-3">現在の電話番号</label>
                <label for="input-phone" class="col-lg-9  control-label" id="nowphone">{{ Session::get('user_name')}}</label>
            </div>
            <div class="row">
                <div class="form-group">
                    {{-- {!! Form::open() !!} --}}
                    <label class="col-lg-2" for="phone">
                        {!! Form::label('user_phone', '新しい電話番号：') !!}
                    </label>
                    <div class="col-lg-2">
                        {!! Form::text('user_phone1', null, ['class' => 'form-control', 'id' => 'input-phone1'  ]) !!}
                    </div>
                    <div class="col-lg-1">
                        -
                    </div>
                    <div class="col-lg-2">
                        {!! Form::text('user_phone1', null, ['class' => 'form-control', 'id' => 'input-phone1'  ]) !!}
                    </div>
                    <div class="col-lg-1">
                        -
                    </div>
                    <div class="col-lg-2">
                        {!! Form::text('user_phone1', null, ['class' => 'form-control', 'id' => 'input-phone1'  ]) !!}
                    </div>
                    <div class="col-lg-2">
                        <div style="color:#ff0000; font-size:8pt;">
                            ※半角数字のみ
                        </div>
                    </div>
                    {{-- {!! Form::button('変更', ['class' => 'btn btn-primary form-control', 'id' => 'button-phone', 'data-loading-text' => '変更中']) !!} --}}
                    <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-9" id="button-phone" data-loading-text="変更中" value="電話番号変更">
                    {{-- {!! Form::close() !!} --}}
                </div>
                <br />
            </div>
<<<<<<< HEAD
        </div>{{-- パネルボデー --}}
    </div>{{-- 隠すためのやつ --}}
</div>{{-- パネル --}}
=======
            <br />

        </div>
        </div>{{-- パネルボデー --}}
    </div>{{-- 隠すためのやつ --}}

</div>{{-- パネル --}}
>>>>>>> 3b8ef382138181fd65941c8c542d332d958b40ff
