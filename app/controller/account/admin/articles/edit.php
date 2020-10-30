<?php
$data=$db->where('id',$id)->objectBuilder()->getOne('Articles',[
	'title','link','demo','description','keywords']);
if(empty($data)){
	die(header('location:/404'));
}
$_SESSION['DATA']['Articles']['ID']=$id;
$urlCrt[2]=$data->title;
$script='/public/account/admin/articles/add';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/articles/edit.php';
require_once 'app/controller/motherPage/adminFooter.php';