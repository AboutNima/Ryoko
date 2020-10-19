<div class="block">
	<div class="header">
		<h6>ثبت خبر جدید</h6>
	</div>
	<div class="body">
		<div class="validation-message no-margin top"></div>
		<form action="/ajax/account/admin/students/add" class="ajax-handler" method="post">
			<input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
			<div class="row">
				<div class="col-sm-6">
					<div class="input-mask required" mask-type mask-label="عنوان">
						<input type="text" name="data[title]" placeholder="عنوان خبر را وارد کنید" autocomplete="off">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="input-mask required" mask-type mask-label="لینک">
						<input type="text" name="data[link]" placeholder="لینک خبر را وارد کنید" autocomplete="off">
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask required" mask-type mask-label="خلاصه">
						<input type="text" name="data[demo]" placeholder="خلاصه خبر را وارد کنید" autocomplete="off">
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask required" mask-type mask-label="متن">
						<textarea name="data[description]" rows="3" placeholder="متن خبر را وارد کنید" autocomplete="off"></textarea>
					</div>
				</div>
                <div class="col-sm-8">
                    <div class="input-mask required" mask-type mask-label="کلیدواژه ها">
                        <input type="text" name="data[keywords]" placeholder="کلید واژه ها را وارد کنید" autocomplete="off">
                    </div>
                </div>
				<div class="col-sm-4">
					<div class="input-mask required" mask-type mask-label="تاریخ آرشیو">
						<input class="date-picker" type="text" name="data[archiveDate]" placeholder="تاریخ آرشیو خبر را وارد کنید" autocomplete="off">
					</div>
				</div>
			</div>
            <div class="clearFix">
                <div class="hr"></div>
                <div class="input-mask no-mask-margin">
                    <button class="btn btn-purple float-left"> ثبت خبر جدید </button>
                </div>
            </div>
			</form>
		</div>
	</div>
</div>