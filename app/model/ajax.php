<?php
switch($urlPath[1])
{
	case 'account':
		switch($urlPath[2])
		{
			case 'admin':
				if(isset($_SESSION['Admin']))
				{
					switch($urlPath[3])
					{
						case 'news':
							switch($urlPath[4]){
								case 'add':
									if(!isset($_POST['Token']) || $_POST['Token']!=$_SESSION['Token']) die();
									if(isset($_POST['data']))
									{
										$data=$_POST['data'];
										
									}
									break;
							}
							break;
					}
				}else{
					switch($urlPath[3])
					{
						case 'login':
							if(!isset($_POST['Token']) || $_POST['Token']!=$_SESSION['Token']) die();
							if(isset($_POST['data']))
							{
								$data=$_POST['data'];
								$validation=new Validation($data,[
									'username'=>[
										'required[نام کاربری]','usernameCharacter[نام کاربری]'
									],
									'password'=>[
										'required[گذرواژه]'
									],
								]);
								if($validation->getStatus())
								{
									die(json_encode([
										'type'=>'danger',
										'msg'=>$validation->getErrors(),
										'err'=>-1,
										'data'=>null
									]));
								}
								$check=$db->where('username',$data['username'])->
								where('password',cryptPassword($data['password'],$data['username'],'RyokoAdminLogin'))->
								objectBuilder()->getOne('Admin',[
									'id','password','username'
								]);
								if(empty($check))
								{
									die(json_encode([
										'type'=>'danger',
										'msg'=>'نام کاربری یا گذرواژه اشتباه است',
										'err'=>0,
										'data'=>null
									]));
								}

								// Set remember me cookie
								if(isset($_POST['RememberMe']))
								{
									$time=time()+3600*24*7;
									setcookie('Admin',json_encode([
										'username'=>$check->username,
										'password'=>$check->password
									]),$time,'/');
								}

								$_SESSION['Admin']=[
									'timeOut'=>time(),
									'id'=>$check->id,
									'username'=>$check->username,
									'password'=>$check->password
								];
								die(json_encode([
									'type'=>'success',
									'msg'=>'ورود موفقیت آمیز بود. هم اکنون به پنل مدیریت هدایت می شوید ...',
									'err'=>null,
									'data'=>null
								]));
							}
							break;
					}
				}
				break;
		}
		break;
}