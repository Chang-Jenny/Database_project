<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  session_start();
require_once("login_check.php");
$sql="SELECT `*` FROM `member` WHERE `account`='".$_SESSION["account"]."'";
$RecLogin = mysqli_query($conn, $sql);
//取出帳號密碼的值
$search=mysqli_fetch_assoc($RecLogin);
$name = $search["Fname"];


  $sql = "SELECT Cid, Cteacher FROM course WHERE Cid='".$_POST["id"]."' AND Cteacher ='".$_SESSION["account"]."'";
  $record = mysqli_query($conn, $sql);
  if(mysqli_num_rows($record)>0) {
    header("Location: register.php?registered=true&account=".$_POST["account"]);
  } 
  else {
    $temp = "SELECT Cid FROM course WHERE Cname='".$_POST["cname"]."'"."AND Cteacher='".$_SESSION["account"]."'";
    $record = mysqli_query($conn, $temp);
    $search=mysqli_fetch_row($record);

    $sql = "INSERT INTO course (Cid, Cname, Cteacher) VALUES (";
    $sql .= "'".$_POST["id"]."',";
    $sql .= "'".$_POST["name"]."',";
    $sql .= "'".$_SESSION["account"]."')";
    mysqli_query($conn, $sql);

    header("Location: teacher.php");
  }
?>