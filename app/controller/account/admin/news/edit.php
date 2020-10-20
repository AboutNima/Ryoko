<?php
$data=$db->where('id',$id)->objectBuilder()->getOne('News',[
	'title','link','demo','description','keywords','UNIX_TIMESTAMP(archiveDate) as archiveDate'
]);
if(empty($data)){
	die(header('location:/account/news/list'));
}
$urlCrt[2]=$data->title;
$script='/public/account/admin/news/add';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/news/edit.php';
require_once 'app/controller/motherPage/adminFooter.php';
