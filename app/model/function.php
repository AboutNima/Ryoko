<?php
function randomText($length=5,$upperCase=true)
{
	$string='abcdefghijkmnpqrstuvwxyz123456789';
	if($upperCase) $string.='ABCDEFGHJKLMNOPQRSTUVWXYZ';
	$output='';
	for($i=0;$i<$length;$i++)
	{
		$output.=$string[rand(0,strlen($string)-1)];
	}
	return $output;
}
function cryptPassword($password,$param,$salt='')
{
	return hash('sha256',$password.$param.md5('PasswordGenerator').sha1($password.$salt));
}
function verifyPassword($check,$password,$param,$salt='')
{
	return $check==cryptPassword($password,$param,$salt);
}
function randomCode($length=5)
{
	$output='';
	for($i=0;$i<$length;$i++) $output.=rand(0,9);
	return $output;
}
function humanTiming($time)
{
	$time=strtotime('now')-$time;
	$time=($time<1)?1:$time;
	$tokens=array(
		31536000=>'سال',
		2592000=>'ماه',
		604800=>'هفته',
		86400=>'روز',
		3600=>'ساعت',
		60=>'دقیقه',
		1=>'ثانیه'
	);
	foreach($tokens as $unit=>$text){
		if($time<$unit) continue;
		$numberOfUnits=floor($time/$unit);
		return $numberOfUnits.' '.$text.' پیش';
	}
}
function convertToGregorian($date,$hasTime=false,$delimiter='/')
{
	global $calendar;
	if(empty($date)) return '';
	require_once 'jDateTime.php';
	if($hasTime) $date=explode($delimiter[0],str_replace([$delimiter,' '],$delimiter[0],$date));
	else $date=explode($delimiter,$date);
	foreach($date as $item)
	{
		$fmt=numfmt_create('fa', NumberFormatter::DECIMAL);
		$cnt[]=numfmt_parse($fmt, $item);
	}
	$output=$calendar->date('Y/m/d', $calendar->mktime(12,0,0,
		$cnt[1],
		$cnt[2],
		$cnt[0]
	), false, false, 'America/New_York');
	return $hasTime===true ? $output.' '.$date[3] : $output ;
}
function faToEn($string){
	return strtr($string, array('۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
}
function SKUser($username,$password,$name,$surname)
{
	global $sk;
	global $db;
	$result=$sk->execute('createUser',[
		'nickname'=>$name.' '.$surname,
		'username'=>$username,
		'password'=>$password,
		'fname'=>$name,
		'lname'=>$surname,
	]);
	if($result['ok']) $SKID=$result['result'];
	else{
		$data=$sk->execute('getUser',['username'=>$username])['result'];
		$SKID=$data['id'];
	}
	$db->insert('SkyRoom',[
		'SKID'=>$SKID,
		'username'=>$username,
		'password'=>$password
	]);
	if($db->getLastErrno()==1062)
	{
		$sk->execute('updateUser',[
			'user_id'=>$SKID,
			'password'=>$password
		]);
		$db->where('SKID',$SKID)->update('SkyRoom',[
			'username'=>$username,
			'password'=>$password
		]);
	}
	return $SKID;
}
function SKRemoveUsers($skid,$classId)
{
	global $sk;
	if(!is_array($skid)) $skid=[$skid];
	$result=$sk->execute('removeRoomUsers',[
		'room_id'=>$classId,
		'users'=>$skid
	]);
	var_dump($result);
	return $result['ok'] ? true : false;
}
function SKRoom($serviceId=null,$room=null,$title,$guest=false,$operatorFirst=false,$maxUsers=null,$timeLimit=null,$sessionDuration=null)
{
	global $sk;
	if($room!==null)
	{
		return $sk->execute('updateRoom',[
			'room_id'=>$room,
			'title'=>$title,
			'max_users'=>$maxUsers,
			'time_limit'=>$timeLimit,
			'session_duration'=>$sessionDuration,
			'guest_login'=>$guest,
			'op_login_first'=>$operatorFirst,
		])['ok'];
	}else{
		//	$link=$_SESSION['DATA']['Branch']->id.'-'.randomText(10,false);
		$link=randomText(10,false);
		return [$sk->execute('createRoom',[
			'name'=>$link,
			'title'=>$title,
			'service_id'=>$serviceId,
			'max_users'=>$maxUsers,
			'time_limit'=>$timeLimit,
			'session_duration'=>$sessionDuration,
			'guest_login'=>$guest,
			'op_login_first'=>$operatorFirst,
		])['result'],$link];
	}
}