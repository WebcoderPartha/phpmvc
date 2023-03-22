<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Advanced PHP OOP Bangla Tutorial</title>
    <style>
        body {font-family: arial;font-size: 15px;line-height: 18px;margin: 0 auto;width: 850px;background:#EEEEEE}
        a{color:#3399FF;}
        .headeroption {background: #3399ff url("img/php.png") no-repeat scroll 25px 12px;height: 74px;overflow: hidden;padding-left: 140px;}
        .headeroption h2{color: #000;font-size: 30px;padding-top: 2px;text-shadow: 0 1px 1px #fff;}
        .content{background: #fff;border: 6px solid #3399ff;font-size: 16px;line-height: 22px;margin-bottom: 3px;margin-top: 3px;min-height: 380px;overflow: hidden;padding: 10px;}

        .subject {border-bottom: 1px solid #3399ff;font-size: 20px;margin-bottom: 10px;padding-bottom: 10px;}
        .subject p{margin:0;}
        .changePasswordForm {
            margin: 50px auto;
            width: 50%;
            box-shadow: 5px 5px 5px #999;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .insert{color:#06960E;font-weight:bold;}
        .delete{color:#DE5A24;font-weight:bold;}

        .mainleft{border-right: 1px dotted #999;float:left;margin-right:16px;width: 350px;}
        .mainright{float:right;width:450px;}

        .tblone{width:100%;border:1px solid #fff;}
        .tblone td{padding:5px 10px;text-align:center;}

        table.tblone tr:nth-child(2n+1){background:#fff;height:30px;}
        table.tblone tr:nth-child(2n){background:#fdf0f1;height:30px;}

        input[type="text"],input[type="email"],input[type="password"] {border:1px solid #ddd;margin-bottom:5px;padding:5px;width:228px;font-size:16px}
        input[type="submit"]{cursor: pointer; padding: 5px 20px; background: #177de3; border:none; color:#fff}

        .footeroption{height:90px;background:#177de3;overflow:hidden;padding-top:10px;}
        .footerone {background: #3aa0ff;border-radius: 5px;float: left;font-size:18px;line-height:23px;margin-left: 10px;padding:6px 10px;text-align:center;text-shadow: 1px 0 2px #fff;width:390px;overflow: hidden;}
        .footerone p{margin:0;}
        .menu ul {
            padding: 0;
            margin: 0;
        }
        .menu ul li{
            padding: 5px 10px;
            display: inline-block;
            background: #3399ff;
        }
        .menu ul li a {
            text-decoration: none;
            color: #fff;
        }
        .box {
            width: 29%;
            float: left;
            background: lightgreen;
            margin: 5px;
            box-shadow: 5px 5px 5px #999;
            color: #000;
            text-align: center;
        }
    </style>
    <?php Session::init(); ?>
</head>
<body>
<header class="headeroption">
    <h2>Advanced PHP OOP Tutorial [MVC Framework]</h2>

</header>
<div class="content">
    <div class="menu">
        <ul>
            <li><a href="<?php echo BASE_URL; ?>/admin">Dashboard</a></li>
            <li><a href="<?php echo BASE_URL; ?>/admin/category">Category</a></li>
            <li><a href="">Post</a></li>
            <li><a href="">Users</a></li>
            <li><a href="<?php echo BASE_URL; ?>/Admin/myProfile">My Profile</a></li>
            <li style="background:red"><a href="<?php echo BASE_URL; ?>/login/logout">Logout (<?php echo Session::get('username'); ?>)</a></li>
        </ul>
    </div>
    <hr>