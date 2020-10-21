<?php
$data=$db->orderBy('id','DESC')->objectBuilder()->get('Articles',null,[
	'id',"CONCAT(name,' ',surname) as name",'username','suspend','access','UNIX_TIMESTAMP(createdAt) as createdAt']);
$script='/public/account/admin/articles/list';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/articles/list.php';
require_once 'app/controller/motherPage/adminFooter.php';