<?php  
    $name = $_GET["name"];
    $rand = $_GET["rand"];

    $conn = mysqli_connect('localhost','root','','oms');
    $sql_select = "SELECT name, qrrand FROM user WHERE name = '$name'";
    $ret = mysqli_query($conn,$sql_select);
    $row = mysqli_fetch_array($ret);
    if($name==$row['name'] && $rand==$row['qrrand']){
        echo "验证通过, ". $name. " 您可进入此会场";
    }
    else{
        echo "验证失败！请核查二维码";
    }
?>