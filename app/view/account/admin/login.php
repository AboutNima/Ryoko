<!doctype html>
<html lang="fa">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> ورود به حساب مدیریت | مجموعه مدارس امید </title>
	<link rel="stylesheet/less" href="/public/account/admin/login/app.less">
</head>
<body>

<div class="ajax"></div>

<div class="page">
    <div class="header"></div>
    <div class="body">
        <form action="/ajax/account/admin/login" method="post">
            <input type="text" value="<?php echo $_SESSION['Token'] ?>" name="Token" hidden>
            <div class="validation-message"></div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-mask required" mask-type mask-label="نام کاربری">
                        <input type="text" name="data[username]" autocomplete="off" placeholder="نام کاربری را اینجا وارد کنید">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-mask required" mask-type mask-label="گذرواژه">
                        <input type="password" autocomplete="off" name="data[password]" placeholder="گذرواژه را اینجا وارد کنید">
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-mask mt-2" style="width: auto" mask-type="checkbox">
                        <input type="checkbox" label="مرا به خاطر بسپار" name="RememberMe" value="on">
                    </div>
                </div>
            </div>
            <div class="hr no-margin"></div>
            <div class="clearFix">
                <div class="input-mask no-mask-margin float-left" style="width: auto">
                    <button class="btn btn-success"> ورود </button>
                </div>
                <div class="float-right mt-2">
                    <a href="/"> بازگشت به صفحه اصلی <i class="far fa-long-arrow-left"></i> </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    less={
        env: 'development'
    }
</script>
<script src="/public/construct/less.min.js"></script>
<script src="/public/construct/jquery.min.js"></script>
<script src="/public/construct/input/input.js"></script>
<script src="/public/construct/input/ajax-handler.js"></script>
<script src="/public/construct/validationMessage/validation.js"></script>
<script src="/public/account/admin/login/script.js"></script>
</body>
</html>