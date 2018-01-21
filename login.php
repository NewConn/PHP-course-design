<html>
<head>
	<meta charset="UTF-8">
	<title>用户登录页面</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="style.js"></script>
</head>

<body>
    <hgroup>
        <h1>登录</h1>
        <h3>By 牛康</h3>
    </hgroup>
		
    <form id="loginform" action="loginaction.php" method="post">
        <div class="group">
            <input type="text" id="username" name="username" required="required" class="form-control"
            value="<?php echo isset($_COOKIE["wang"])?$_COOKIE["wang"]:"";?>" />
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>姓名</label>
        </div>
        
        <div class="group">
            <input type="password" id="password" name="password" required="required" class="form-control" />
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>密码</label>
        </div>
        
        <?php
            $err=isset($_GET["err"])?$_GET["err"]:"";
            switch($err) {
                case 1:
                echo "用户名或密码错误！";
                break;
                case 2:
                echo "用户名或密码不能为空！";
                break;
            }
        ?>

            <button type="submit" id="login" name="login" value="登录" class="button buttonBlue">登录
                <div class="ripples buttonRipples">
                    <span class="ripplesCircle"></span>
                </div>
            </button>
        </form>
    <div align="center">
        还没有账号，快去<a href="signup.php">注册</a>吧
    </div>
</body>
</html>