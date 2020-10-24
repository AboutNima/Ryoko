<?php
$data=$db->where('id',$id)->objectBuilder()->getOne('Projects',[
	'title','description']);
if(empty($data)){
	die(header('location:/404'));
}
$_SESSION['DATA']['EDIT']['ID']=$id;
$urlCrt[2]=$data->title;
$script='/public/account/admin/projects/add';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/projects/edit.php';
require_once 'app/controller/motherPage/adminFooter.php';