<?php
    ini_set('display_errors',1); 
    include 'phpqrcode.php';
    //声明变量
    $username = isset($_POST['username'])?$_POST['username']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
    $remember = isset($_POST['remember'])?$_POST['remember']:"";

    //判断用户名和密码是否为空
    if(!empty($username)&&!empty($password)) {
        //建立连接
        $conn = mysqli_connect('localhost','root','','oms');
        // if(!$conn){
        //     die('Could not connect: ' . mysqli_error());  
        // }
        //准备SQL语句
        $sql_select = "SELECT name, password FROM user WHERE name = '$username' AND password = '$password'";
        //执行SQL语句
        $ret = mysqli_query($conn,$sql_select);

        $row = mysqli_fetch_array($ret);

        //判断用户名或密码是否正确
        if($username==$row['name'] && $password==$row['password']) {
            //选中“记住我”
            if($remember=="on") {
                //创建cookie
                setcookie("wang", $username, time()+7*24*3600);
            }

            // 生成二维码，保存图片
            $qrcode_path = "qrcode/";
            $qrcode_name = "qrcode_". $username. ".png";
            $qrcode_rand = md5(time()+7*24*3600);   //32位
            $qrcode_value = "https://www.niukangw.cn/php_nk/qrcode.php?name=".$username. "&rand=". $qrcode_rand;
            
            //生成二维码图片   
            QRcode::png($qrcode_value, $qrcode_path. $qrcode_name);

            $sql_insert = "UPDATE user set qrrand='$qrcode_rand' where name='$username'";
            mysqli_query($conn, $sql_insert);
            //开启session
            session_start();
            //创建session
            $_SESSION['user']=$username;
            //跳转到loginsucc.php页面
            header("Location:loginsucc.php");
            //关闭数据库
            mysqli_close($conn);
        }else {
            //用户名或密码错误，赋值err为1
            header("Location:login.php?err=1");
        }
    }else {
        //用户名或密码为空，赋值err为2
        header("Location:login.php?err=2");
    }

?>