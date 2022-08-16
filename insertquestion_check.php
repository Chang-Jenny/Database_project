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
// $_SESSION["eid"]=$_POST["id"];
// $_SESSION["ename"]=$_POST["name"];
// $_SESSION["etype"]=$_POST["type"];
// $_SESSION["total"]=$_POST["total"];
// $_SESSION["pass"]=$_POST["pass"];

    // $temp = "SELECT Cid FROM course WHERE Cname='".$_POST["cname"]."'"."AND Cteacher='".$_SESSION["account"]."'";
    // $record = mysqli_query($conn, $temp);
    // $search=mysqli_fetch_row($record);

    for($i=1;$i<=$_SESSION["total"];$i++){
    $sql = "INSERT INTO questions (`Qeid`, `Qid`, `question`, `A`, `B`, `C`, `D`, `answer`) VALUES (";
    $sql .= "'".$_SESSION["eid"]."',";
    $sql .= "'".$i."',";
    $sql .= "'".$_POST["Q".$i]."',";
    $sql .= "'".$_POST["CA".$i]."',";
    $sql .= "'".$_POST["CB".$i]."',";
    if(empty($_POST["CC".$i])) $_POST["CC".$i]="isnull";
    if(empty($_POST["CD".$i])) $_POST["CD".$i]="isnull";

    $sql .= "'".$_POST["CC".$i]."',";
    $sql .= "'".$_POST["CD".$i]."',";
    $sql .= "'".$_POST["answer".$i]."')";
    mysqli_query($conn, $sql);
    }
    header("Location: teacher.php");
  
?>