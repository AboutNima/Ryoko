<div class="block">
	<div class="header">
		<div class="title">
            <h6> مدیریت مدیران </h6>
            <p> در این قسمت می توانید مدیران قبلی را مدیریت کنید و یا مدیر جدید ایجاد کنید </p>
		</div>
        <div class="more float-left">
            <div class="item">
                <i class="fal fa-ellipsis-h"></i>
            </div>
            <div class="menu">
                <a href="#add" class="popup-active" popup-target="#add"><span><i class="far fa-layer-plus"></i> ایجاد مدیریت جدید </span></a>
            </div>
        </div>
	</div>
	<div class="body">
		<div class="table-mask">
			<table>
				<thead>
				<tr>
					<th> ردیف </th>
					<th> نام و نام خانوادگی </th>
					<th> نام کاربری </th>
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
							<td><?php echo $item->name; ?></td>
							<td><?php echo $item->username; ?></td>
							<td>
                                <?php if($item->suspend=='0'): ?>
                                <span class="label label-success"> فعال </span>
                                <?php else: ?>
                                <span class="label label-danger"> مسدود </span>
                                <?php endif; ?>
                            </td>
							<td><?php echo $calendar->date("j F Y",$item->createdAt); ?></td>
							<td>
								<div class="d-inline-block">
                                    <div class="more">
                                        <div class="item">
                                            <i class="fal fa-ellipsis-h"></i>
                                        </div>
                                        <div class="menu">
                                            <a href="#edit" data-id="<?php echo $item->id ?>"><span><i class="far fa-file-edit"></i> ویرایش </span></a>
                                            <a href="#resetPassword" class="balloon" balloon-timeout="0" balloon-position="right" balloon-text="دوبار کلیک کنید" data-id="<?php echo $item->id ?>"><span><i class="far fa-redo"></i> بازنشانی گذرواژه </span></a>
                                        </div>
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

<div class="popup" popup-size="md" popup-title="ایجاد مدیریت جدید" id="add">
    <div class="validation-message no-margin top"></div>
    <form action="/ajax/account/admin/manageAdmins/add" class="ajax-handler" method="post">
        <input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
        <div class="row">
            <div class="col-lg-6">
                <div class="input-mask required" mask-type="" mask-label="نام">
                    <input type="text" name="data[name]" autocomplete="off" placeholder="نام را اینجا وارد کنید">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="input-mask required" mask-type="" mask-label="نام خانوادگی">
                    <input type="text" name="data[surname]" autocomplete="off" placeholder="نام خانوادگی را اینجا وارد کنید">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="input-mask required" mask-type="" mask-label="نام کاربری">
                    <input type="text" name="data[username]" autocomplete="off" placeholder="نام کاربری را اینجا وارد کنید">
                </div>
            </div>
        </div>
        <p class="text-danger fsize-13 mt-2 fism"> * توجه داشته باشید پس ایجاد حساب مدیریت، پسورد همان نام کاربری خواهد بود </p>
        <div class="clearFix">
            <div class="hr"></div>
            <div class="input-mask no-mask-margin">
                <button class="btn btn-purple float-left"> ایجاد حساب مدیریت </button>
            </div>
        </div>
    </form>
</div>
<div class="popup" popup-size="md" popup-title="ویرایش مدیریت" id="edit">
    <div class="validation-message no-margin top"></div>
    <form action="/ajax/account/admin/manageAdmins/edit" class="ajax-handler" method="post">
        <input type="text" name="Token" value="<?php echo $_SESSION['Token'] ?>" hidden>
        <div class="row">
            <div class="col-lg-6">
                <div class="input-mask required" mask-type="" mask-label="نام">
                    <input type="text" name="data[name]" autocomplete="off" placeholder="نام را اینجا وارد کنید">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="input-mask required" mask-type="" mask-label="نام خانوادگی">
                    <input type="text" name="data[surname]" autocomplete="off" placeholder="نام خانوادگی را اینجا وارد کنید">
                </div>
            </div>
        </div>
        <div class="clearFix">
            <div class="hr"></div>
            <div class="input-mask no-mask-margin">
                <button class="btn btn-purple float-left"> ویرایش حساب مدیریت </button>
            </div>
        </div>
    </form>
</div>