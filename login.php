<?php
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_start();
// 驗證成功導入網頁
if(isset($_SESSION["account"]) && ($_SESSION["account"]!="")){
    $sql_level = "SELECT `level` FROM `member` WHERE `account`='".$_SESSION["account"]."'";
    $level = mysqli_query($conn, $sql_level);
    $search=mysqli_fetch_assoc($level);
    $judge = $search["level"];
    if($judge=="1") header("Location: student.php");
    else header("Location: teacher.php");
        
}

//執行登入
if(isset($_POST["account"]) && isset($_POST["password"])){
    $sql = "SELECT * FROM `member` WHERE `account`='".$_POST["account"]."'";
    $RecLogin = mysqli_query($conn, $sql);
    //取出帳號密碼的值
    $row_RecLogin=mysqli_fetch_assoc($RecLogin);
    $account = $row_RecLogin["account"];
    $password = $row_RecLogin["password"];
    //比對
    if($_POST["password"]==$password){
        $_SESSION["account"]=$account;
        if(isset($_POST["remember"]) && ($_POST["remember"]=="true")){
            setcookie("account", $_POST["account"], time()+365);
            setcookie("password", $_POST["password"], time()+365);    
        }
        else{
            if(isset($_COOKIE["account"])){
                setcookie("account", $_POST["account"], time()-100);
                setcookie("password", $_POST["password"], time()-100);
            }
        }
        // 判斷是誰給不同權限
        $sql_identity = "SELECT `identity` FROM `member` WHERE `account`='".$_POST["account"]."'";
        $level = mysqli_query($conn, $sql_identity);
        $search=mysqli_fetch_assoc($level);
        $judge = $search["identity"];
        if($judge=="S"){
            header("Location: student.php");
        }
        else{
            header("Location: teacher.php");
        }
    }
    else{
        header("Location: index.php?errMsg=1");
    }
}
else{
    header("Location: index.php?errMsg=1");
}
?>