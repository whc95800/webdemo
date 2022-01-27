<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:23 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>ログイン</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">

    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/theAdmin.css" rel="stylesheet">
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg re-admin-body">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div class="re-admin-login-body">
            <div class="m-b-md">
                <img src="img/logo.png" style="width:200px"/>
            </div>

            <form class="m-t" role="form" action="login_check.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="ユーザー名" required="" name="username"	<?php if(isset($_GET["username"])){ echo "value=\"".$_GET["username"]."\""; }?>>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="パスワード" required="" name="password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="login-submit">ログイン</button>


            </form>
        </div>
    </div>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/layer/layer.min.js"></script>
    <script>
	<?php 
		    if (isset($_GET["error"])) {
		        if ($_GET["error"]=="wrongpwd") {
		            echo "layer.msg('アカウントまたはパスワードが正しくありません。');";
		        }
		        else if ($_GET["error"]=="empty") {
		            echo "layer.msg('ユーザー名とパスワードの入力が必要です。');";
		        }
		    }
		?>

    </script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:23 GMT -->
</html>
