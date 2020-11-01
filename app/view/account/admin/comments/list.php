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
					<th> عنوان مقاله </th>
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
							<td><?php echo $item->title ?></td>
							<td><?php echo $calendar->date("j F Y",$item->createdAt); ?></td>
							<td>
								<div class="more">
									<div class="item">
										<i class="fal fa-ellipsis-h"></i>
									</div>
									<div class="menu">
                                        <a href="/account/comments/<?php echo $item->id ?>/information"><span><i class="fa fa-file-alt"></i> دیگر مشخصات </span></a>
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
						<td colspan="7" class="no-data"> موردی برای نمایش وجود ندارد! </td>
					</tr>
				<?php
				endif;
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>