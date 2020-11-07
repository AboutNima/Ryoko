<div class="block">
	<div class="header">
		<div class="title">
			<h6> محصولات ثبت شده </h6>
			<p> در این قسمت می توانید محصولات ثبت شده را مدیریت کنید و یا محصول جدید ثبت کنید </p>
		</div>
		<div class="more float-left">
			<div class="item">
				<i class="fal fa-ellipsis-h"></i>
			</div>
			<div class="menu">
				<a href="#add" class="popup-active" popup-target="#add"><span><i class="far fa-layer-plus"></i> ایجاد محصول جدید </span></a>
			</div>
		</div>
	</div>
	<div class="body">
		<div class="table-mask">
			<table>
				<thead>
				<tr>
					<th> ردیف </th>
					<th> عکس </th>
					<th> عنوان </th>
					<th> تاریخ ثبت </th>
					<th> گزینه ها </th>
				</tr>
				</thead>
				<tbody>
				<?php
				if(!empty($data)):
					$num=1;
					foreach($data as $item):
						?>
						<tr>
							<td><?php echo $num++ ?></td>
							<td><img src="/<?php echo $item->image ?>" style="width: 100px"></td>
							<td><?php echo $item->title; ?></td>
							<td><span class="label label-warning"><?php echo $calendar->date("j F Y",$item->createdAt); ?></span></td>
							<td>
								<div class="more">
									<div class="item">
										<i class="fal fa-ellipsis-h"></i>
									</div>
									<div class="menu">
										<a href="#edit" data-id="<?php echo $item->id ?>"><span><i class="far fa-file-edit"></i> ویرایش </span></a>
										<a href="#delete" class="balloon" balloon-timeout="0" balloon-position="right" balloon-text="دوبار کلیک کنید" data-id="<?php echo $item->id ?>"><span><i class="far fa-trash"></i> حذف </span></a>
									</div>
								</div>
							</td>
						</tr>
					<?php
					endforeach;
				else:
					?>
					<tr>
						<td colspan="6" class="no-data"> موردی برای نمایش وجود ندارد! </td>
					</tr>
				<?php
				endif;
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="popup" popup-size="lg" popup-title="ایجاد محصول جدید" id="add">
	<div class="validation-message no-margin top"></div>
	<form action="/ajax/account/admin/products/add" class="ajax-handler" method="post">
		<input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
		<div class="row">
			<div class="col-12">
				<div class="input-mask required" mask-type mask-label="عنوان">
					<input type="text" name="data[title]" placeholder="عنوان محصول را وارد کنید" autocomplete="off">
				</div>
			</div>
			<div class="col-12">
				<div class="input-mask required" mask-type mask-label="توضیحات">
					<textarea name="data[description]" id="description" rows="3" placeholder="توضیحات محصول را وارد کنید"></textarea>
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
				<button class="btn btn-purple float-left"> ایجاد </button>
			</div>
		</div>
	</form>
</div>
<div class="popup" popup-size="lg" popup-title="ویرایش محصول" id="edit">
	<div class="validation-message no-margin top"></div>
	<form action="/ajax/account/admin/products/edit" class="ajax-handler" method="post">
		<input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
		<div class="row">
			<div class="col-12">
				<div class="input-mask required" mask-type mask-label="عنوان">
					<input type="text" name="data[title]" placeholder="عنوان محصول را وارد کنید" autocomplete="off">
				</div>
			</div>
			<div class="col-12">
				<div class="input-mask required" mask-type mask-label="توضیحات">
					<textarea name="data[description]" id="description" rows="3" placeholder="توضیحات محصول را وارد کنید" autocomplete="off"></textarea>
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
				<button class="btn btn-purple float-left"> ویرایش و ذخیره </button>
			</div>
		</div>
	</form>
</div>