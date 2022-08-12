<!DOCTYPE html>
<?php
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_start();
require_once("login_check.php");
$sql="SELECT `Fname` FROM `member` WHERE `account`='".$_SESSION["account"]."'";
$RecLogin = mysqli_query($conn, $sql);
//取出帳號密碼的值
$search=mysqli_fetch_assoc($RecLogin);
$name = $search["Fname"];
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/input.css">
  </head>
  <body>
  <form name="form1" method="post" action="teachersearch.php">
        <hr size="1" />
        <p align="center">
          <input type="submit" name="insert" value="新增評量">
          <input type="submit" name="searchmyexam" value="查詢我的評量">
          <input type="submit" name="searchscore" value="查詢評量成績">
        </p>
      </form>
  </body>  