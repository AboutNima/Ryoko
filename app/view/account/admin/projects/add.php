<div class="block">
	<div class="header">
		<h6>ثبت پروژه جدید</h6>
	</div>
	<div class="body">
		<div class="validation-message no-margin top"></div>
		<form action="/ajax/account/admin/projects/add" class="ajax-handler" method="post">
			<input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
			<div class="row">
				<div class="col-12">
					<div class="input-mask required" mask-type mask-label="عنوان">
						<input type="text" name="data[title]" placeholder="عنوان پروژه را وارد کنید" autocomplete="off">
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask required" mask-type mask-label="متن">
						<textarea name="data[description]" id="description" rows="3" placeholder="متن پروژه را وارد کنید" autocomplete="off"></textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask required" mask-type="upload:0.5MB,jpg-jpeg-png-tiff" mask-label="عکس">
						<input type="file" name="file">
					</div>
				</div>
			</div>
			<div class="clearFix">
				<div class="hr"></div>
				<div class="input-mask no-mask-margin">
					<button class="btn btn-purple float-left"> ثبت پروژه جدید </button>
				</div>
			</div>
		</form>
	</div>
</div>