<div class="block">
	<div class="header">
		<h6> مشخصات ثبت شده </h6>
	</div>
	<div class="body">
		<div class="validation-message no-margin top"></div>
		<div class="row">
			<div class="col-lg-4">
				<div class="input-mask">
					<input type="text" value="<?php echo $data->name ?>" disabled>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-mask">
					<input type="text" value="<?php echo $data->phoneNumber ?>" disabled>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-mask">
					<input type="text" value="<?php if(empty($data->email)) echo 'ثبت نشده'; else echo $data->email ?>" disabled>
				</div>
			</div>
			<div class="col-12">
				<div class="input-mask">
					<textarea rows="3" disabled><?php echo $data->text ?></textarea>
				</div>
			</div>
		</div>
		<div class="clearFix">
			<div class="input-mask no-mask-margin">
				<a href="#accept" data-id="<?php echo $data->id ?>"><button class="btn btn-success float-left mr-1">تایید</button></a>
				<a href="#delete" data-id="<?php echo $data->id ?>"><button class="btn btn-danger float-left ml-1">رد</button></a>
			</div>
		</div>
	</div>
</div>