<?php
$data=$db->orderBy('id','DESC')->objectBuilder()->get('Projects',null,[
	'id','title','link','description','UNIX_TIMESTAMP(createdAt) as createdAt']);
$script='/public/account/admin/projects/list';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/projects/list.php';
require_once 'app/controller/motherPage/adminFooter.php';