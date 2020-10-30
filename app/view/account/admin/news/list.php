<div class="block">
	<div class="header">
		<div class="title">
			<h6> اخبار ثبت شده </h6>
			<p> در این قسمت میتوانید اخبار ثبت شده را مدیریت کنید </p>
		</div>
        <div class="more float-left">
            <div class="item">
                <i class="fal fa-ellipsis-h"></i>
            </div>
            <div class="menu">
                <a href="/account/news/add"><span><i class="far fa-layer-plus"></i> ایجاد خبر جدید </span></a>
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
					<th> خلاصه خبر </th>
					<th> تاریخ آرشیو </th>
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
							<td><?php echo $item->title; ?></td>
							<td class="hidden-text" title="<?php echo $item->demo ?>"><?php echo $item->demo; ?></td>
							<td><span class="label label-warning"><?php echo $calendar->date("j F Y",$item->archiveDate); ?></span></td>
							<td>
								<div class="d-inline-block">
                                    <div class="more">
                                        <div class="item">
                                            <i class="fal fa-ellipsis-h"></i>
                                        </div>
                                        <div class="menu">
                                            <a href="/news/<?php echo $item->link ?>"><span><i class="far fa-file-alt"></i> نمایش </span></a>
                                            <a href="/account/news/<?php echo $item->id ?>/edit"><span><i class="far fa-file-edit"></i> ویرایش </span></a>
                                            <a href="#delete" class="balloon" balloon-timeout="0" balloon-position="right" balloon-text="دوبار کلیک کنید" data-id="<?php echo $item->id ?>"><span><i class="far fa-trash"></i> حذف </span></a>
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