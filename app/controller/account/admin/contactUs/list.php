<?php
$data=$db->where('status','0')->objectBuilder()->get('ContactUs',null,[
	'id',"CONCAT(name,' ',surname) as name",'topic','phoneNumber','UNIX_TIMESTAMP(createdAt) as createdAt'
]);
$script='/public/account/admin/contactUs/list';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/contactUs/list.php';
require_once 'app/controller/motherPage/adminFooter.php';