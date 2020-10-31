<?php
$data=$db->orderBy('id','DESC')->objectBuilder()->get('Slider',null,[
	'id','title','description','image','status','UNIX_TIMESTAMP(createdAt) as createdAt']);
$script='/public/account/admin/slider';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/slider.php';
require_once 'app/controller/motherPage/adminFooter.php';