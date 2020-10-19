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
										$data['archiveDate']=convertToGregorian($data['archiveDate']);
										$data['image']=isset($_FILES['file'])?$_FILES['file']:'';
										$validation = new Validation($data,[
											'title'=>['required[عنوان]','length[عنوان,حداکثر,255]:max,255'],
											'link'=>['required[لینک]','length[لینک,حداکثر,255]:max,255'],
											'description'=>'required[متن]',
											'demo'=>['required[خلاصه]','length[خلاصه,حداکثر,255]:max,255'],
											'keywords'=>'required[کلیدواژه ها]',
											'archiveDate'=>['required[تاریخ آرشیو]','date[تاریخ آرشیو]'],
											'image'=>['required[عکس]','upload[jpg.jpeg.png.tiff,512]:png.jpg.jpeg.tiff,512']
										]);
										if($validation->getStatus()){
											die(json_encode([
												'type'=>'danger',
												'msg'=>$validation->getErrors(),
												'err'=>-1,
												'data'=>null
											]));
										}
										$upload=new \Verot\Upload\Upload($data['image']);
										if($upload->uploaded){
											$upload->file_new_name_body=sha1(randomCode(10));
											$upload->image_resize=true;
											$upload->image_x=800;
											$upload->image_y=600;
											$upload->process('public/home/media/news');
											if($upload->processed) $data['image']=str_replace('\\','/',$upload->file_dst_pathname);
										}
										$data['keywords']=json_encode($data['keywords']);
										$id=$db->insert('News',$data);
										if((bool)$id){
											die(json_encode([
												'type'=>'success',
												'msg'=>'خبر با موفقیت ثبت شد.',
												'err'=>null,
												'data'=>null
											]));
										}else{
											unlink($data['image']);
											if($db->getLastErrno()=='1062'){
												die(json_encode([
													'type'=>'warning',
													'msg'=>'این لینک قبلا ثبت شده است.',
													'err'=>0,
													'data'=>null
												]));
											}
											die(json_encode([
												'type'=>'warning',
												'msg'=>'مشکلی در انجام درخواست شما پیش آمده. با پشتیبان سایت تماس بگیرید و کد ('.$db->getLastErrno().') را اعلام نمایید',
												'err'=>-2,
												'data'=>null
											]));
										}
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