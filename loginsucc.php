<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>登录成功</title>
    <link href="css/loginsucc.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/modernizr.js"></script>
    <![endif]-->
</head>

<body>
    <?php
        //开启session
        session_start();
        //声明变量
        $username= isset($_SESSION['user'])?$_SESSION['user']:"";
        //判断session是否为空
        if(!empty($username)){
            $conn = mysqli_connect('localhost','root','','oms');
            $sql_select = "SELECT name, picpath FROM user WHERE name = '$username' ";
            $ret = mysqli_query($conn, $sql_select);
            $row = mysqli_fetch_array($ret);
            $user = $row['name'];
            $pic = $row['picpath'];
            $new_pic = "images/photo.jpg";
            copy($pic, $new_pic);
            mysqli_close($conn);
            $qrcode = "qrcode/". "qrcode_".$username. ".png";
            // echo '<h1>'. $user. "欢迎您!". '</h1>';
            // echo '<img src="'.$pic.' " alt="头像" />';

    ?>
    <header>
        <nav id="nav">
            <ul>
                <li>
                    <a href="#">网站首页</a>
                </li>
            </ul>
            <script src="js/silder.js"></script>
            <!--获取当前页导航 高亮显示标题-->
        </nav>
    </header>


        <div class="mainContent">
            <aside>
                <div class="avatar">
                <a href="#">
                    <?php
                        echo "<span>$user</span>";
                    ?>
                </a>
                </div>

                <section class="topspaceinfo">
                    <?php
                        echo '<h1>'.$user.'欢迎您!'. '</h1>';
                    ?>
                </section>

                
            </aside>
            <div class="blogitem">
                <article>
                    <h2 class="title">
                        <a href="#">这是您的访问二维码，请在进入会场时出示此二维码!</a>
                    </h2>
                    <ul class="text">
                        <?php
                            echo '<p class="textimg"><img src="'.$qrcode.' " alt="qrcode" /></p>';
                        ?>
                    </ul>
                </article>
            </div>
        </div>
        <footer>
            <div class="footavatar">
                <a href="logout.php">退出</a>
            </div>
        </footer>
        <?php
            }else {
                echo "<h1>你无权访问！！！</h1>";  
            }
        ?>  
</body>

</html>