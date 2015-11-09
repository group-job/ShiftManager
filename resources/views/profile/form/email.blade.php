{{-- メールアドレス変更 --}}
<div class="panel panel-info">{{-- パネル --}}
    <div class="panel-heading" >{{-- パネルヘッダー --}}
        <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#form-email" data-toggle="tooltip" title="クリックしてね">メールアドレス変更</a>
        </h4>
    </div>{{-- パネルヘッダー --}}
    <div id="form-email" class="panel-collapse collapse">{{-- 隠すためのやつ --}}
        <div class="panel-body">{{-- パネルボデー --}}
            <div class="row">
                <label class="control-label  col-lg-3">現在のメールアドレス</label>
                <label for="input-email" class="col-lg-9  control-label" id="nowemail">{{ Session::get('user_name')}}</label>
            </div>
            <div class="form-group">
                <div class="row">
                    {{-- {!! Form::open() !!} --}}
                    <label class="col-lg-3" for="newemail">
                        {!! Form::label('user_email', '新しいメールアドレス：') !!}
                    </label>
                    <div class="col-lg-4">
                        {!! Form::text('user_email', null, ['class' => 'form-control', 'id' => 'input-email'  ]) !!}
                    </div>
                    <div class="col-lg-2">
                        <div style="color:#ff0000; font-size:8pt;">
                            ※半角英数のみ
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-3" for="newemail2">
                        {!! Form::label('user_email2', '新しいメールアドレス(再入力)：') !!}
                    </label>
                    <div class="col-lg-4">
                        {!! Form::text('user_email2', null, ['class' => 'form-control', 'id' => 'input-email2'  ]) !!}
                    </div>
                    <div class="col-lg-2">
                        <div style="color:#ff0000; font-size:8pt;">
                            ※半角英数のみ
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- {!! Form::button('変更', ['class' => 'btn btn-primary form-control', 'id' => 'button-email', 'data-loading-text' => '変更中']) !!} --}}
                    <input type="button" class="btn btn-primary  col-lg-4 col-lg-offset-7" id="button-email" data-loading-text="変更中" value="メールアドレス変更">
                    {{-- {!! Form::close() !!} --}}
                </div>
            </div>
            <br />
        </div>{{-- パネルボデー --}}
    </div>{{-- 隠すためのやつ --}}
</div>{{-- パネル --}}