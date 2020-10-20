<?php
$data=$db->orderBy('id','DESC')->objectBuilder()->get('News',null,[
	'id','title','demo','keywords','UNIX_TIMESTAMP(archiveDate) as archiveDate','UNIX_TIMESTAMP(createdAt) as createdAt']);
$script='public/account/admin/news/list';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/news/list.php';
require_once 'app/controller/motherPage/adminFooter.php';