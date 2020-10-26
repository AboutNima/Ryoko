<?php
$data=$db->orderBy('id','DESC')->objectBuilder()->get('Branches',null,[
	'id','title','address','createdAt','UNIX_TIMESTAMP(createdAt) as createdAt']);
$script='/public/account/admin/branches/list';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/branches/list.php';
require_once 'app/controller/motherPage/adminFooter.php';