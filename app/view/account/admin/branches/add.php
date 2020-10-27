<div class="block">
	<div class="header">
		<h6>ثبت شعبه جدید</h6>
	</div>
	<div class="body">
		<div class="validation-message no-margin top"></div>
		<form action="/ajax/account/admin/branches/add" class="ajax-handler" method="post">
			<input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
			<div class="row">
				<div class="col-lg-5">
					<div class="input-mask required" mask-type mask-label="عنوان">
						<input type="text" name="data[title]" placeholder="عنوان شعبه را وارد کنید" autocomplete="off">
					</div>
				</div>
				<div class="col-lg-7">
					<div class="input-mask required" mask-type mask-label="آدرس">
						<input type="text" name="data[address]" placeholder="آدرس شعبه را وارد کنید" autocomplete="off">
					</div>
				</div>
			</div>
			<div class="clearFix">
				<div class="hr"></div>
				<div class="input-mask no-mask-margin">
					<button class="btn btn-purple float-left"> ثبت شعبه جدید </button>
				</div>
			</div>
		</form>
	</div>
</div>