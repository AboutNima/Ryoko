<div class="block">
	<div class="header">
        <div class="title">
            <h6> مقالات ثبت شده </h6>
            <p> در این قسمت میتوانید مقالات ثبت شده را مدیریت کنید </p>
        </div>
        <div class="more float-left">
            <div class="item">
                <i class="fal fa-ellipsis-h"></i>
            </div>
            <div class="menu">
                <a href="/account/articles/add"><span><i class="far fa-layer-plus"></i> ایجاد مقاله جدید </span></a>
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
					<th> تعداد بازدید </th>
					<th> امتیاز </th>
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
							<td class="balloon" balloon-position="top" balloon-text="<?php echo $item->title ?>" balloon-delay="0">
                                <p class="hidden-text" style="margin: auto;max-width: 100px"><?php echo $item->title ?></p>
                            </td>
							<td><span class="label label-primary"><?php echo $item->view ?></span></td>
							<td><span class="label label-warning"><?php echo $item->score ?></span></td>
							<td><?php echo $calendar->date("j F Y",$item->createdAt) ?></td>
							<td>
                                <div class="d-inline-block">
                                    <div class="more">
                                        <div class="item">
                                            <i class="fal fa-ellipsis-h"></i>
                                        </div>
                                        <div class="menu">
                                            <a href="/articles/<?php echo $item->link ?>"><span><i class="far fa-file-alt"></i> نمایش </span></a>
                                            <a href="/account/articles/<?php echo $item->id ?>/edit"><span><i class="far fa-file-edit"></i> ویرایش </span></a>
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