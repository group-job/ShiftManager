{{-- 画像変更 --}}
<div class="panel panel-info">{{-- パネル --}}
    <div class="panel-heading" >{{-- パネルヘッダー --}}
        <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#form-image" data-toggle="tooltip" title="クリックしてね">画像変更</a>
        </h4>
    </div>{{-- パネルヘッダー --}}
    <div id="form-image" class="panel-collapse collapse">{{-- 隠すためのやつ --}}
        <div class="panel-body">{{-- パネルボデー --}}
            <div class="form-group">
                <div class="row">
                    {{-- {!! Form::open() !!} --}}
                    <label class="col-lg-3" for="newimage">
                        {!! Form::label('user_image', '画像：') !!}
                    </label>
                    <div class="col-lg-4">
                        {!! Form::file('user_image', ['class' => 'form-control', 'id' => 'input-image'  ]) !!}
                    </div>
                </div>
                <div class="row">
                    {{-- {!! Form::button('変更', ['class' => 'btn btn-primary form-control', 'id' => 'button-image', 'data-loading-text' => '変更中']) !!} --}}
                    <input type="button" class="btn btn-primary  col-lg-2 col-lg-offset-9" id="button-image" data-loading-text="変更中" value="画像変更">
                    {{-- {!! Form::close() !!} --}}
                </div>
            </div>
            <br />
        </div>{{-- パネルボデー --}}
    </div>{{-- 隠すためのやつ --}}
</div>{{-- パネル --}}