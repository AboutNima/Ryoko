<?php
// Set define
define('SiteAddress','http://omidsara.ir');

// Set Date Default Time Zone
date_default_timezone_set('Asia/Tehran');

// Start ob_start() Function
ob_start();

// Read And Fetch config.ini.php File
$ini=parse_ini_file('config.ini.php',true,INI_SCANNER_TYPED);

// Include Model File
$model=[
	'jDateTime','DataValidation/Validation','function','Upload'
];

if(!is_array($model)) $model=[$model];
$model=array_merge(['MysqliDb'],$model);
foreach($model as $item) require_once 'app/model/'.$item.'.php';

// Get Url
$urlPath=explode('?',$_SERVER['REQUEST_URI'],2);
$urlPath=explode('/',$urlPath[0]);
array_splice($urlPath,0,1);
$urlPath[]=null;

//Convert Url
$urlCrt=array();
foreach($urlPath as $item)
{
	switch($item)
	{
		case 'account': $urlCrt[]='داشبورد';break;
		case 'setting': $urlCrt[]='تنظیمات';break;
		case 'list': $urlCrt[]='لیست';break;
		case 'news': $urlCrt[]='اخبار';break;
		case 'add': $urlCrt[]='افزودن';break;
		case 'edit': $urlCrt[]='ویرایش';break;
		case 'tools': $urlCrt[]='ابزار';break;
		case 'equipments': $urlCrt[]='تجهیزات و امکانات';break;
		case 'history': $urlCrt[]='تاریخچه';break;
		case 'information': $urlCrt[]='مشخصات ثبت شده';break;
		case 'mechanizedScanning': $urlCrt[]='سیستم اسکن مکانیزه (QRCode)';break;
		case 'students': $urlCrt[]='کارآموزان';break;
		case 'consumingMaterials': $urlCrt[]='مواد مصرفی';break;
		case 'manageAdmins': $urlCrt[]='مدیریت مدیران';break;
		case 'accounting': $urlCrt[]='حسابداری';break;
		case 'title': $urlCrt[]='سرفصل ها';break;
		default: $urlCrt[]=$item;break;
	}
}
unset($urlCrt[count($urlCrt)-1]);

// Start Session
session_start();

//Start Create Session Token
if(!isset($_SESSION['Token']) || empty($_SESSION['Token'])) $_SESSION['Token']=strtoupper(bin2hex(random_bytes(32)));

//Start Site Coding
if($urlPath[0]=='logout')
{
	if(isset($_COOKIE['Admin'])) setcookie('Admin',null,-1,'/');
	session_destroy();
	$location=isset($_GET['BackTo']) ? $_GET['BackTo'] : '/';
	die(header('location:'.$location));
}
switch($urlPath[0])
{
	// Ajax
	case 'ajax':
		require_once 'app/model/ajax.php';
		break;

	// Login pages
	case 'admin':
		if(isset($_SESSION['Admin'])) die(header('location:/account'));
		else{
			if(isset($_COOKIE['Admin']))
			{
				$data=json_decode($_COOKIE['Admin']);
				$check=$db->where('username',$data->username)->
				where('password',$data->password)->objectBuilder()->getOne('Admin',[
					'id'
				]);
				if(empty($check))
				{
					setcookie('Admin',null,-1,'/');
					break;
				}
				$_SESSION['Admin']=[
					'timeOut'=>time(),
					'id'=>$check->id,
					'username'=>$data->username,
					'password'=>$data->password
				];
				die(header('location:/account'));
			}
			require_once 'app/controller/account/admin/login.php';
		}
		break;

	// Accounts
	case 'account':
		if(isset($_SESSION['Admin']))
		{
			$data=$db->where('id',$_SESSION['Admin']['id'])->
			objectBuilder()->getOne('Admin',[
				'id','name','surname','username','password','access','avatar'
			]);
			if(empty($data) || $_SESSION['Admin']['password']!=$data->password || time()-$_SESSION['Admin']['timeOut']>7200) die(header('location:/logout'));
			$_SESSION['Admin']=[
				'timeOut'=>time(),
				'id'=>$data->id,
				'name'=>$data->name,
				'surname'=>$data->surname,
				'password'=>$data->password,
				'username'=>$data->username,
				'avatar'=>$data->avatar,
				'access'=>json_decode($data->access),
			];

			switch($urlPath[1])
			{
				case '':
					require_once 'app/controller/account/admin/home.php';
					break;
				case 'news':
					switch($urlPath[2]){
						case '':
						case 'list':
							require_once 'app/controller/account/admin/news/list.php';
							break;
						case 'add':
							require_once 'app/controller/account/admin/news/add.php';
							break;
						default:
							if(!empty($id=$urlPath[2]))
							{
								switch($urlPath[3])
								{
									case 'edit':
										require_once 'app/controller/account/admin/news/edit.php';
										break;
									default:
										die(header('location/404'));
								}

							}
					}
					break;
				case 'manageAdmins':
					switch($urlPath[2]){
						case '':
						case 'list':
							require_once 'app/controller/account/admin/manageAdmins/list.php';
							break;
						case 'add':
							require_once 'app/controller/account/admin/manageAdmins/add.php';
							break;
						default:
							if(!empty($id=$urlPath[2])){
								switch($urlPath[3]){
									case 'edit':
										require_once 'app/controller/account/admin/manageAdmins/edit.php';
										break;
									default:
										die(header('location:/404'));
								}
							}
					}
					break;
				case 'articles':
					switch($urlPath[2]){
						case '':
						case 'list':
							require_once 'app/controller/account/admin/articles/list.php';
							break;
						case 'add':
							require_once 'app/controller/account/admin/articles/add.php';
							break;
						default:
							if(!empty($id=$urlPath[2])){
								switch($urlPath[3]){
									case 'edit':
										require_once 'app/controller/account/admin/articles/edit.php';
										break;
									default:
										die(header('location:/404'));
								}
							}
							break;
					}
				default:
					die(header('location:/404'));
			}

		}else die(header('location:/404'));
		break;

	// Site
	case '':
		require_once 'app/controller/home/home.php';
		break;

	// Page error
	case '404':
		echo '404';
		break;
	default:
		die(header('location:/404'));
		break;
}