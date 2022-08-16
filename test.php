<?php
header("Content-Type: text/html; charset=utf-8");
$db_host = 'localhost:8889';
$db_username = 'root';
$db_password = 'root';
$db_table = 'phpbook_db';

//資料庫連線
$conn = mysqli_connect($db_host, $db_username, $db_password);
$select = mysqli_select_db($conn, $db_table);
if(!$select){
  die("無法選擇至資料庫");
}
mysqli_query($conn, "SET NAMES 'utf8'");

session_start();
// 驗證成功導入網頁
if(isset($_SESSION["account"]) && ($_SESSION["account"]!="")){
    header("Location: member_center.php");
}
//執行登入
if(isset($_POST["account"]) && isset($_POST["password"])){
    $sql = "SELECT * FROM `member` WHERE `account`='".$_POST["account"]."'";
    $RecLogin = mysqli_query($conn, $sql);
    //取出帳號密碼的值
    $row_RecLogin=mysqli_fetch_assoc($RecLogin);
    $account = $row_RecLogin["account"];
    $password = $row_RecLogin["password"];
    echo $password;
}
?>