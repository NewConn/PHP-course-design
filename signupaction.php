<?php 
    $username = isset($_POST['username'])?$_POST['username']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
    $re_password = isset($_POST['re_password'])?$_POST['re_password']:"";
    $sex = isset($_POST['sex'])?$_POST['sex']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $phone = isset($_POST['phone'])?$_POST['phone']:"";
    // 图片
    if ($_FILES["file"]["error"] > 0){
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }else{
        $pic_path = "pic/";
        $pic_name = $username. ".". substr(strrchr($_FILES["file"]["name"], '.'), 1); ;
        $pic_fullpath = $pic_path. $pic_name;
        move_uploaded_file($_FILES["file"]["tmp_name"], $pic_fullpath);
    }
    if($password == $re_password) {
        $conn = mysqli_connect('localhost','root','','oms');
        if(!$conn){
            die('Could not connect: ' . mysqli_error());  
        }
        //准备SQL语句,查询用户名
        $sql_select="SELECT name FROM user WHERE username = '$username'";
        //执行SQL语句
        $ret = mysqli_query($conn,$sql_select);
        $row = mysqli_fetch_array($ret);
        //判断用户名是否已存在
        if($username == $row['username']) {
            //用户名已存在，显示提示信息
            header("Location:signup.php?err=1");
        } else {

            //用户名不存在，插入数据
            //准备SQL语句
            $sql_insert = "INSERT INTO user(name, password, sex, email, phone, picpath) VALUES('$username','$password','$sex','$email','$phone', '$pic_fullpath')";
            //执行SQL语句
            mysqli_query($conn,$sql_insert);
            header("Location:signup.php?err=3");
        }

        //关闭数据库
        mysqli_close($conn);
    } else {
        header("Location:signup.php?err=2");
    }
?>