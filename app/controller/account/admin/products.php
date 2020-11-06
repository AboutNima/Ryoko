<?php
$data=$db->orderBy('id','DESC')->objectBuilder()->get('Products',null,[
	'id','title','description','image','UNIX_TIMESTAMP(createdAt) as createdAt']);
$script='/public/account/admin/products';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/products.php';
require_once 'app/controller/motherPage/adminFooter.php';