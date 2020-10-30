<div class="block">
	<div class="header">
		<h6>ویرایش پروژه</h6>
	</div>
	<div class="body">
		<div class="validation-message no-margin top"></div>
		<form action="/ajax/account/admin/projects/edit" class="ajax-handler" method="post">
			<input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
			<div class="row">
                <div class="col-sm-6">
                    <div class="input-mask required" mask-type mask-label="عنوان">
                        <input type="text" name="data[title]" placeholder="عنوان پروژه را وارد کنید" autocomplete="off" value="<?php echo $data->title; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-mask required" mask-type mask-label="لینک">
                        <input type="text" name="data[link]" placeholder="لینک پروژه را وارد کنید" autocomplete="off" value="<?php echo $data->link; ?>">
                    </div>
                </div>
				<div class="col-12">
					<div class="input-mask required" mask-type mask-label="متن">
						<textarea name="data[description]" id="description" rows="3" placeholder="متن پروژه را وارد کنید" autocomplete="off"><?php echo $data->description; ?></textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask" mask-type="upload:0.5MB,jpg-jpeg-png-tiff" mask-label="عکس">
						<input type="file" name="file">
					</div>
				</div>
			</div>
			<div class="clearFix">
				<div class="hr"></div>
				<div class="input-mask no-mask-margin">
					<button class="btn btn-purple float-left"> ویرایش پروژه </button>
				</div>
			</div>
		</form>
	</div>
</div>