<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  session_start();
  //檢查是否已登入
  require_once("login_check.php");
  //執行更新動作
  $sql = "UPDATE `member` SET ";
  $sql .= "`Fname`='".$_POST["Fname"]."',";
  $sql .= "`Lname`='".$_POST["Lname"]."',";	
  $sql .= "`sex`='".$_POST["sex"]."',";
  $sql .= "`bdate`='".$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]."',";
  $sql .= "`email`='".$_POST["email"]."',";
  $sql .= "`cellphone`='".$_POST["cellphone"]."' ";
  $sql .= "WHERE `account`= '".$_SESSION["account"]."' ";
  mysqli_query($conn,$sql);
  //修改完成後重新回到首頁
  // 判斷是誰給不同權限
  $sql_identity = "SELECT `identity` FROM `member` WHERE `account`='".$_SESSION["account"]."'";
  $level = mysqli_query($conn, $sql_identity);
  $search=mysqli_fetch_assoc($level);
  $judge = $search["identity"];
  if($judge=="S"){
      header("Location: student.php");
  }
  else{
      header("Location: teacher.php");
  }
?>