<?php
$data=$db->where('id',$id)->objectBuilder()->getOne('Admin',[
	'name','surname','username','suspend','access']);
if(empty($data)){
	die(header('location:/404'));
}
$_SESSION['DATA']['EDIT']['ID']=$id;
$urlCrt[2]=$data->name.' '.$data->surname;
$script='/public/account/admin/manageAdmins/add';
require_once 'app/controller/motherPage/adminHeader.php';
require_once 'app/view/account/admin/manageAdmins/edit.php';
require_once 'app/controller/motherPage/adminFooter.php';
