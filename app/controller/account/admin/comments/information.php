<?php
$data=$db->where('Comments.id',$id)->join('Articles','Comments.articleId=Articles.id')->objectBuilder()->getOne('Comments',[
	'Comments.id as id',"CONCAT(name,' ',surname) as name",'phoneNumber','email','text','status','Comments.createdAt as createdAt','title'
]);
$_SESSION['DATA']['EDIT']['ID']=$id;
$urlCrt[2]=$data->title;
$script='/public/account/admin/comments/information';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/comments/information.php';
require_once 'app/controller/motherPage/adminFooter.php';