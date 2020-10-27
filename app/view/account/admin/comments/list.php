<div class="block">
	<div class="header">
		<div class="title">
			<h6> نظرات ثبت شده </h6>
			<p> در این قسمت میتوانید نظرات ثبت شده را مدیریت کنید </p>
		</div>
	</div>
	<div class="body">
		<div class="table-mask">
			<table>
				<thead>
				<tr>
					<th> ردیف </th>
					<th> نام و نام خانوادگی </th>
					<th> شماره موبایل </th>
					<th> ایمیل </th>
					<th> متن </th>
					<th> عنوان مقاله </th>
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
							<td><?php echo $item->phoneNumber; ?></td>
							<td>
                                <?php if(empty($item->email)): ?>
                                <span class="label label-warning">ثبت نشده</span>
                                <?php else: echo $item->email; endif; ?>
                            </td>
							<td><?php echo $item->text ?></td>
							<td><?php echo $item->title ?></td>
                            <td><a href="#accept" class="btn btn-success ml-1 balloon" balloon-timeout="0" balloon-position="right" balloon-text="دوبار کلیک کنید" data-id="<?php echo $item->id ?>">تایید</a>
                                <a href="#delete" class="btn btn-danger mr-1 balloon" balloon-timeout="0" balloon-position="left" balloon-text="دوبار کلیک کنید" data-id="<?php echo $item->id ?>">رد</a></td>
							<td><?php echo $calendar->date("j F Y",$item->createdAt); ?></td>
							<td>
								<div class="more">
									<div class="item">
										<i class="fal fa-ellipsis-h"></i>
									</div>
									<div class="menu">
										<a href="/articles/<?php echo $item->aId ?>"><span><i class="far fa-file-alt"></i> نمایش مقاله </span></a>
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