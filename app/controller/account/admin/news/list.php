<?php
$data=$db->orderBy('id','DESC')->objectBuilder()->get('News',null,[
	'id','title','link','demo','keywords','UNIX_TIMESTAMP(archiveDate) as archiveDate'
]);
$script='/public/account/admin/news/list';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/news/list.php';
require_once 'app/controller/motherPage/adminFooter.php';