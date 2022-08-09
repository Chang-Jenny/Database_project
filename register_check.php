<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  //確認帳號是否已註冊
  $sql = "SELECT account FROM member WHERE account='".$_POST["account"]."'";
  $record = mysqli_query($conn, $sql);
  if(mysqli_num_rows($record)>0) {
    header("Location: register.php?registered=true&account=".$_POST["account"]);
  } 
  else {
    // 新註冊用戶需要判斷身分為學生或老師
    if($_POST["identity"]=="student") $_POST["identity"]="S";
    if($_POST["identity"]=="teacher") $_POST["identity"]="T";
    //若此帳號尚未註冊，則執行新增的動作
    $sql = "INSERT INTO member (account, password, Fname, Lname, sex, bdate, email, cellphone, score, identity) VALUES (";
    $sql .= "'".$_POST["account"]."',";
    $sql .= "'".$_POST["password1"]."',";
    $sql .= "'".$_POST["Fname"]."',";
    $sql .= "'".$_POST["Lname"]."',";
    $sql .= "'".$_POST["sex"]."',";
    $sql .= "'".$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]."',";
    $sql .= "'".$_POST["email"]."',";
    $sql .= "'".$_POST["cellphone"]."',";
    $sql .= "'"."0"."',";
    $sql .= "'".$_POST["identity"]."')";
    mysqli_query($conn, $sql);
  }
?>
<script language="javascript">
  alert("註冊成功\n請用申請的帳號密碼登入");
  window.location.href = "index.php";
</script>
