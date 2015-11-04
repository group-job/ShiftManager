{{-- 名前変更 --}}
    <div class="panel panel-info">

        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#add" data-toggle="tooltip" title="クリックしてね" id="panel-address">住所変更</a>
            </h4>
        </div>

        <div id="add" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="row">
					           <label class="control-label  col-lg-3">現在の氏名</label>
					          <label for="input-address" class="col-lg-9  control-label" id="nowaddress">{{ Session::get('user_name')}}</label>
				      </div>
					<div class="row">
					  <div class="form-group">
						        <label class="col-lg-3" for="address1">新しい氏名</label>
						        <div class="col-lg-4"><input type="text" class="form-control " name="address1" id="input-address1" placeholder="0000000" required="required">
                    </div>
					  </div>

					<br />
					<input type="button" class="btn btn-primary col-lg-offset-8 col-lg-2" id="loading-address" data-loading-text="変更中" value="住所変更">
			</div>
		</div>
	</div>
