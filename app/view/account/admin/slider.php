<div class="block">
	<div class="header">
		<div class="title">
			<h6> شعبه های ثبت شده </h6>
			<p> در این قسمت میتوانید شعبه های ثبت شده را مدیریت کنید </p>
		</div>
		<div class="more float-left">
			<div class="item">
				<i class="fal fa-ellipsis-h"></i>
			</div>
			<div class="menu">
				<a href="#add" class="popup-active" popup-target="#add"><span><i class="fas fa-layer-plus"></i> ثبت اسلاید جدید </span></a>
			</div>
		</div>
	</div>
	<div class="body">
		<div class="table-mask">
			<table>
				<thead>
				<tr>
					<th> ردیف </th>
					<th> عنوان </th>
					<th> عکس </th>
					<th> توضیحات </th>
					<th> وضعیت </th>
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
							<td><?php echo $item->description; ?></td>
							<td>
                                <?php
                                if($item->status == '1'):
                                ?>
                                <span class="label label-success"> فعال </span>
                                <?php else: ?>
                                <span class="label label-danger"> غیر فعال </span>
                                <?php endif; ?>
                            </td>
							<td><?php echo $calendar->date("j F Y",$item->createdAt); ?></td>
							<td>
								<div class="more">
									<div class="item">
										<i class="fal fa-ellipsis-h"></i>
									</div>
									<div class="menu">
										<a href="#edit" data-id="<?php echo $item->id ?>"><span><i class="far fa-file-edit"></i> ویرایش </span></a>
                                        <a href="#status" class="balloon" balloon-timeout="0" balloon-position="right" balloon-text="دوبار کلیک کنید" data-id="<?php echo $item->id ?>"><span><i class="far fa-exchange"></i> تغییر وضعیت </span></a>
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
<div class="popup" popup-size="md" popup-title="ثبت اسلاید جدید" id="add">
	<div class="validation-message no-margin top"></div>
	<form action="/ajax/account/admin/slider/add" class="ajax-handler" method="post">
		<input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
		<div class="row">
			<div class="col-sm-5">
				<div class="input-mask required" mask-type mask-label="عنوان">
					<input type="text" name="data[title]" placeholder="عنوان اسلاید را وارد کنید" autocomplete="off">
				</div>
			</div>
			<div class="col-sm-7">
				<div class="input-mask required" mask-type mask-label="توضیحات">
					<input type="text" name="data[description]" placeholder="توضیحات اسلاید را وارد کنید" autocomplete="off">
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
				<button class="btn btn-purple float-left"> ثبت اسلاید جدید </button>
			</div>
		</div>
	</form>
</div>
<div class="popup" popup-size="md" popup-title="ویرایش اسلاید" id="edit">
    <div class="validation-message no-margin top"></div>
    <form action="/ajax/account/admin/slider/edit" class="ajax-handler" method="post">
        <input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
        <div class="row">
            <div class="col-sm-5">
                <div class="input-mask required" mask-type mask-label="عنوان">
                    <input type="text" name="data[title]" placeholder="عنوان اسلاید را وارد کنید" autocomplete="off">
                </div>
            </div>
            <div class="col-sm-7">
                <div class="input-mask required" mask-type mask-label="توضیحات">
                    <input type="text" name="data[description]" placeholder="توضیحات اسلاید را وارد کنید" autocomplete="off">
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
                <button class="btn btn-purple float-left"> ویرایش اسلاید </button>
            </div>
        </div>
    </form>
</div>