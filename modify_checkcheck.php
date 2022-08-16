<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  session_start();
  //檢查是否已登入
  require_once("login_check.php");
  //執行更新動作
  $sql = "UPDATE `questions` SET ";
  $sql .= "`question`='".$_POST["question"]."',";
  $sql .= "`A`='".$_POST["A"]."',";	
  $sql .= "`B`='".$_POST["B"]."',";
  $sql .= "`C`='".$_POST["C"]."',";
  $sql .= "`D`='".$_POST["D"]."',";
  $sql .= "`answer`='".$_POST["answer"]."' ";
  $sql .= "WHERE `Qeid`= '".$_SESSION["selectE"]."' AND `Qid`='".$_SESSION["qnum"]."'";
  mysqli_query($conn,$sql);
  echo $sql;

 header("Location: teachermodifyquestion.php");
?>