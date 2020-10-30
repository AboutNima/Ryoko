<div class="block">
	<div class="header">
        <div class="title">
            <h6> ثبت مقاله جدید </h6>
            <p> در این قسمت می توانید مقاله جدید ثبت کنید </p>
        </div>
        <div class="more float-left">
            <a href="/account/articles/list" class="back"> بازگشت <i class="far fa-angle-double-left"></i></a>
        </div>
	</div>
	<div class="body">
		<div class="validation-message no-margin top"></div>
		<form action="/ajax/account/admin/articles/add" class="ajax-handler" method="post">
			<input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
			<div class="row">
				<div class="col-sm-6">
					<div class="input-mask required" mask-type mask-label="عنوان">
						<input type="text" name="data[title]" placeholder="عنوان مقاله را وارد کنید" autocomplete="off">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="input-mask required" mask-type mask-label="لینک">
						<input type="text" name="data[link]" placeholder="لینک مقاله را وارد کنید" autocomplete="off">
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask required" mask-type mask-label="خلاصه">
						<input type="text" name="data[demo]" placeholder="خلاصه مقاله را وارد کنید" autocomplete="off">
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask required" mask-type mask-label="متن">
						<textarea name="data[description]" id="description" rows="3" placeholder="متن مقاله را وارد کنید" autocomplete="off"></textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask required" mask-type="tag" mask-label="کلیدواژه ها">
						<input type="text" name="data[keywords][]" placeholder="کلید واژه ها را وارد کنید" autocomplete="off">
					</div>
					<p class="text-danger fsize-13 fykm"> * کلیدواژه ها را با دو فاصله از هم جدا کنید </p>
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
					<button class="btn btn-purple float-left"> ثبت مقاله جدید </button>
				</div>
			</div>
		</form>
	</div>
</div>