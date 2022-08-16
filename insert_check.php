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


  //確認帳號是否已有評量
  $sql = "SELECT Eid FROM exam WHERE Eid='".$_POST["id"]."'";
  $record = mysqli_query($conn, $sql);
  if(mysqli_num_rows($record)>0) {
    header("Location: temp.php");
  } 
  else {
    $temp = "SELECT Cid FROM course WHERE Cname='".$_POST["cname"]."'"."AND Cteacher='".$_SESSION["account"]."'";
    $record = mysqli_query($conn, $temp);
    $search=mysqli_fetch_row($record);

    $sql = "INSERT INTO exam (Eid, Ename, Etype, Ecid, Eteacher, passlimit, "."count,"." certify, text) VALUES (";
    $sql .= "'".$_POST["id"]."',";
    $sql .= "'".$_POST["name"]."',";
    $sql .= "'".$_POST["type"]."',";
    $sql .= "'".$search[0]."',";
    $sql .= "'".$_SESSION["account"]."',";
    $sql .= "'".$_POST["pass"]."',";
    $sql .= "'".$_POST["total"]."',";
    $sql .= "'".$_POST["score"]."',";
    $sql .= "'".$_POST["txt"]."')";
    mysqli_query($conn, $sql);
    $_SESSION["eid"]=$_POST["id"];
    $_SESSION["ename"]=$_POST["name"];
    $_SESSION["etype"]=$_POST["type"];
    $_SESSION["total"]=$_POST["total"];
    $_SESSION["pass"]=$_POST["pass"];

    header("Location: teacherinsertquestion.php");
  }
?>