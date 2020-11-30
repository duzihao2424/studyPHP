<?php

include '../commend/comDB.php';
$userName = isset($_GET['userName'])?$_GET['userName']:'';
$pwd = isset($_GET['pwd'])?$_GET['pwd']:'';
linkMySql();
login($userName,$pwd,true);
$conn->close();


/*用户登录*/
function login($name, $psd, $normal) {
    global $conn;
    
    if($conn) {
        $result = $conn ->query("select * from usr where userName='{$name}' and password='{$psd}'");
        $row=mysqli_fetch_assoc($result);
        if(!empty($row))
        {
                echo json_encode($row);
        }
        else
        {
            echo '登陆失败';
        }
    }
}


// mysql_select_db("lovepet",$conn) or die("选择数据库失败".mysql_error());
// $conn -> close();

