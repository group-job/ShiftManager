{{-- パスワード変更 --}}
<div class="panel panel-info">{{-- パネル --}}
    <div class="panel-heading" >{{-- パネルヘッダー --}}
        <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#form-password" data-toggle="tooltip" title="クリックしてね">パスワード変更</a>
        </h4>
    </div>{{-- パネルヘッダー --}}
    <div id="form-password" class="panel-collapse collapse">{{-- 隠すためのやつ --}}
        <div class="panel-body">{{-- パネルボデー --}}
            <div class="form-group">
                <div class="row">
                    {{-- {!! Form::open() !!} --}}
                    <label class="col-lg-3" for="nowpassword">
                        {!! Form::label('user_nowpassword', '現在のパスワード：') !!}
                    </label>
                    <div class="col-lg-4">
                        {!! Form::password('user_now_password',['class' => 'form-control', 'id' => 'input-now-password'  ]) !!}
                    </div>
                    <div class="col-lg-2">
                        <div style="color:#ff0000; font-size:8pt;">
                            ※8～20文字
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-3" for="newpassword">
                        {!! Form::label('user_new_password', '新しいパスワード：') !!}
                    </label>
                    <div class="col-lg-4">
                        {!! Form::password('user_new_password', ['class' => 'form-control', 'id' => 'input-new-password'  ]) !!}

                    </div>
                    <div class="col-lg-2">
                        <div style="color:#ff0000; font-size:8pt;">
                            ※8～20文字
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-3" for="newpassword2">
                        {!! Form::label('user_new_password2', '新しいパスワード(再入力)：') !!}
                    </label>
                    <div class="col-lg-4">
                        {!! Form::password('user_new_password2', ['class' => 'form-control', 'id' => 'input-new-password2'  ]) !!}
                    </div>
                    <div class="col-lg-2">
                        <div style="color:#ff0000; font-size:8pt;">
                            ※8～20文字
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- {!! Form::button('変更', ['class' => 'btn btn-primary form-control', 'id' => 'button-password', 'data-loading-text' => '変更中']) !!} --}}
                    <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-9" id="button-password" data-loading-text="変更中" value="パスワード変更">
                    {{-- {!! Form::close() !!} --}}
                </div>
            </div>
            <br />
        </div>{{-- パネルボデー --}}
    </div>{{-- 隠すためのやつ --}}
</div>{{-- パネル --}}
