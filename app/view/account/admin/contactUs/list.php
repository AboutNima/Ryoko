<div class="block">
	<div class="header">
		<div class="title">
			<h6></h6>
			<p></p>
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
					<th> موضوع </th>
					<th> تاریخ ایجاد </th>
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
					<td><?php echo $item->name ?></td>
					<td><?php echo $item->phoneNumber ?></td>
					<td><?php echo $item->topic ?></td>
					<td><?php echo $calendar->date("j F Y",$item->createdAt) ?></td>
					<td>
						<div class="more">
							<div class="item">
								<i class="fal fa-ellipsis-h"></i>
							</div>
							<div class="menu">
								<a href="#read" class="balloon" balloon-timeout="0" balloon-position="right" balloon-text="دوبار کلیک کنید" data-id="<?php echo $item->id ?>"><span><i class="fa fa-eye"></i>خوانده شد</span></a>
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