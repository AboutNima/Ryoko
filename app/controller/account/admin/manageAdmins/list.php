<?php
$data=$db->where('id',['NOT IN'=>['1']])->orderBy('id','DESC')->objectBuilder()->get('Admin',null,[
	'id',"CONCAT(name,' ',surname) as name",'username','suspend','access','UNIX_TIMESTAMP(createdAt) as createdAt']);
$script='/public/account/admin/manageAdmins/list';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/manageAdmins/list.php';
require_once 'app/controller/motherPage/adminFooter.php';