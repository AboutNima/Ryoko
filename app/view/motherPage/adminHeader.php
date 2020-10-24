<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> پنل اختصاصی مدیریت ریوکو </title>

    <link rel="stylesheet/less" href="/public/account/panel/app.less">
	<?php
	if(isset($link))
	{
		if(!is_array($link)) $link=[$link];
		foreach($link as $link)
		{
			echo "<link type='text/css' rel='stylesheet' href='{$link}.css'>";
		}
	}
	?>

</head>
<body>

<div id="asideOpacity"></div>
<header>
    <div class="menu">
        <div class="float-left">
            <ul class="profile">
                <li><a href="#time" class="fsize-12" id="showTime"></a></li>
                <li class="balloon" balloon-position="bottom" balloon-text="اعلان های مدیریت"><i class="fal fa-bell"></i><span class="alert"></span></li>
                <li class="hv balloon" balloon-position="bottom" balloon-text="تنظیمات" onclick="location.replace('/account/setting')">
                    <img src="/<?php echo empty($_SESSION['Admin']['avatar']) ? 'public/construct/media/user.png' : $_SESSION['Admin']['avatar'] ?>" class="picture">
                </li>
            </ul>
        </div>
        <div class="float-right">
            <i class="fal fa-bars" id="showAside"></i>
        </div>
        <div class="float-right">
            <ul class="fast-access">
				<?php
				$url='';
				foreach($urlCrt as $key=>$item):
					$url.='/'.$urlPath[$key];
					?>
                    <li><a href="<?php echo $url ?>"><?php echo $item ?></a></li>
					<?php
					if(isset($urlPath[$key+1]) || $urlPath[$key+1]!=null):
						?>
                        <li><i class="fal fa-chevron-double-left"></i></li>
					<?php
					endif;
				endforeach;
				?>
            </ul>
        </div>
    </div>
</header>
<div class="page">
    <div class="aside-right">
        <div class="header">
            <div class="top">
                <p> پنل مدیریت ریوکو </p>
                <span id="minimizeAside"><i class="fal fa-bars"></i></span>
                <span id="hideAside"><i class="fal fa-times"></i></span>
            </div>
            <div class="profile">
                <p><?php echo $_SESSION['Admin']['name'].' '.$_SESSION['Admin']['surname'] ?></p>
                <div class="menu">
                    <ul>
                        <li><a href="/logout"><i class="fal fa-power-off"></i></a></li>
                        <li><a href="/account/setting"><i class="fal fa-cog"></i></a></li>
                    </ul>
                </div>
                <img src="/<?php echo empty($_SESSION['Admin']['avatar']) ? 'public/construct/media/user.png' : $_SESSION['Admin']['avatar'] ?>">
            </div>
        </div>
        <div class="body">
            <div class="menu">
                <ul>
                    <li><a href="/account"><i class="fad fa-cubes"></i><p> داشبورد </p></a></li>
					<?php
					if($_SESSION['Admin']['id']=='1'):
						?>
                        <li><span><i class="fad fa-users-crown"></i><p> مدیریت مدیران </p>
                                <div class="dropdown">
                                    <ul>
                                        <li><a href="/account/manageAdmins/list"><i class="fas fa-circle"></i><p>لیست</p></a></li>
                                        <li><a href="/account/manageAdmins/add"><i class="fas fa-circle"></i><p>ثبت</p></a></li>
                                    </ul>
                                </div>
                            </span>
                        </li>
					<?php
					endif;
					?>
                    <li class="title"> مدیریت سایت </li>
                    <li><span><i class="fa fa-newspaper"></i><p>اخبار</p>
                            <div class="dropdown">
                                <ul>
                                    <li><a href="/account/news/list"><i class="fas fa-circle"></i><p>لیست</p></a></li>
                                    <li><a href="/account/news/add"><i class="fas fa-circle"></i><p>ثبت</p></a></li>
                                </ul>
                            </div>
                        </span>
                    </li>
                    <li><span><i class="far fa-file-search"></i><p>مقالات</p>
                            <div class="dropdown">
                                <ul>
                                    <li><a href="/account/articles/list"><i class="fas fa-circle"></i><p>لیست</p></a></li>
                                    <li><a href="/account/articles/add"><i class="fas fa-circle"></i><p>ثبت</p></a></li>
                                </ul>
                            </div>
                        </span>
                    </li>
                    <li><span><i class="far fa-cogs"></i><p>پروژه ها</p>
                            <div class="dropdown">
                                <ul>
                                    <li><a href="/account/projects/list"><i class="fas fa-circle"></i><p>لیست</p></a></li>
                                    <li><a href="/account/projects/add"><i class="fas fa-circle"></i><p>ثبت</p></a></li>
                                </ul>
                            </div>
                        </span>
                    </li>
                    <li><a href="/account/comments/list"><i class="far fa-comment-alt-check"></i><p>نظرات</p></a></li>
                    <li class="title"> حسابداری </li>
                    <li><a href="/account/accounting/title/list"><i class="fa fa-list"></i><p> سرفصل ها </p></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div id="ajax"></div>
        <div class="validation-message no-margin top"></div>
        <audio id="sendAudio">
            <source src="/public/account/panel/media/Send.mp3" type="audio/mpeg">
        </audio>
        <audio id="receiveAudio">
            <source src="/public/account/panel/media/Receive.mp3" type="audio/mpeg">
        </audio>