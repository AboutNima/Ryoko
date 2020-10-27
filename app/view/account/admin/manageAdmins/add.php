<div class="block">
	<div class="header">
		<h6>ثبت مدیر جدید</h6>
	</div>
	<div class="body">
		<div class="validation-message no-margin top"></div>
		<form action="/ajax/account/admin/manageAdmins/add" class="ajax-handler" method="post">
			<input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
			<div class="row">
				<div class="col-lg-3">
					<div class="input-mask required" mask-type mask-label="نام">
						<input type="text" name="data[name]" placeholder="نام مدیر را وارد کنید" autocomplete="off">
					</div>
				</div>
				<div class="col-lg-3">
					<div class="input-mask required" mask-type mask-label="نام خانوادگی">
						<input type="text" name="data[surname]" placeholder="نام خانوادگی مدیر را وارد کنید" autocomplete="off">
					</div>
				</div>
				<div class="col-lg-3">
					<div class="input-mask required" mask-type mask-label="نام کاربری">
						<input type="text" name="data[username]" placeholder="نام کاربری مدیر را وارد کنید" autocomplete="off">
					</div>
                    <p class="text-danger fsize-13 fykm"> * رمز عبور همان نام کاربری می باشد </p>
				</div>
				<div class="col-lg-3">
					<div class="input-mask required" mask-type="select" mask-label="دسترسی">
						<select name="data[access]">
							<option value="0">کامل</option>
						</select>
					</div>
				</div>
			</div>
			<div class="clearFix">
				<div class="hr"></div>
				<div class="input-mask no-mask-margin">
					<button class="btn btn-purple float-left"> ثبت مدیر جدید </button>
				</div>
			</div>
		</form>
	</div>
</div>