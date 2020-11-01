<div class="block">
	<div class="header">
        <div class="title">
            <h6> ویرایش مقاله (<?php echo $data->title ?>) </h6>
            <p> در این قسمت می توانید مقاله (<?php echo $data->title ?>) را ویرایش کنید </p>
        </div>
        <div class="more float-left">
            <a href="/account/articles/list" class="back"> بازگشت <i class="far fa-angle-double-left"></i></a>
        </div>
	</div>
	<div class="body">
		<div class="validation-message no-margin top"></div>
		<form action="/ajax/account/admin/articles/edit" class="ajax-handler" method="post">
			<input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
			<div class="row">
				<div class="col-sm-6">
					<div class="input-mask required" mask-type mask-label="عنوان">
						<input type="text" name="data[title]" placeholder="عنوان مقاله را وارد کنید" autocomplete="off" value="<?php echo $data->title; ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="input-mask required" mask-type mask-label="لینک">
						<input type="text" name="data[link]" placeholder="لینک مقاله را وارد کنید" autocomplete="off" value="<?php echo $data->link; ?>">
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask required" mask-type mask-label="خلاصه">
						<input type="text" name="data[demo]" placeholder="خلاصه مقاله را وارد کنید" autocomplete="off" value="<?php echo $data->demo; ?>">
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask required" mask-type mask-label="متن">
						<textarea name="data[description]" id="description" rows="3" placeholder="متن مقاله را وارد کنید" autocomplete="off"><?php echo $data->description; ?></textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="input-mask required" mask-type="tag" mask-label="کلیدواژه ها">
						<input type="text" name="data[keywords][]" placeholder="کلیدواژه ها را وارد کنید" autocomplete="off" value="<?php echo implode('  ',json_decode($data->keywords)); ?>">
					</div>
                    <p class="text-danger fsize-13 mt-2 fism"> * کلیدواژه ها را با دو فاصله از هم جدا کنید </p>
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
					<button class="btn btn-purple float-left"> ویرایش مقاله </button>
				</div>
			</div>
		</form>
	</div>
</div>