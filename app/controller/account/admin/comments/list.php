<?php
$data=$db->orderBy('Comments.id','DESC')->objectBuilder()->join('Articles','Articles.id=Comments.articleId')->get('Comments',null,[
	'Comments.id as id',"CONCAT(name,' ',surname) as name",'phoneNumber','email','text','title','UNIX_TIMESTAMP(Comments.createdAt) as createdAt']);
$urlCrt[2]='نظرات';
$script='/public/account/admin/comments/list';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/comments/list.php';
require_once 'app/controller/motherPage/adminFooter.php';